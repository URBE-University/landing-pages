<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Blade;

class PageController extends Controller
{
    /**
     * Display the landing page or return 404 if doesn't exist
     */
    public function show($page)
    {
        $page = Page::where('slug', $page)->firstorfail();
        return view('web.templates.'.$page->template, [
            'title' => $page->title,
            'about' => $page->about,
            'source' => $page->source,
            'alt_phone' => $page->alt_phone,
            'cover' => $page->cover,
            'document_en_url' => $page->document_en_url,
            'document_es_url' => $page->document_es_url,
            'questions' => $page->questions,
        ]);
    }

    /**
     * Submit form to Hubspot
     */
    public function sendToHubspot(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:dns|email:filter|email:spoof',
            'phone' => 'required'
        ]);

        // Create the contact on the database
        Contact::create([
            'email' => $request['email'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'lead_source' => $request['source']
        ]);

        $hubSpot = \HubSpot\Factory::createWithAccessToken( config('urbe.hubspot.token') );
        // Search contact to avoid duplicates
        $filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
        $filter->setOperator('EQ')
            ->setPropertyName('email')
            ->setValue($request['email']);
        $filterGroup = new \HubSpot\Client\Crm\Contacts\Model\FilterGroup();
        $filterGroup->setFilters([$filter]);
        $searchRequest = new \HubSpot\Client\Crm\Contacts\Model\PublicObjectSearchRequest();
        $searchRequest->setFilterGroups([$filterGroup]);
        $contactsPage = $hubSpot->crm()->contacts()->searchApi()->doSearch($searchRequest);

        // Create lead if doesn't already exist in database
        if ((integer) $contactsPage->getTotal() < 1) {
            try {
                $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
                $contactInput->setProperties([
                    'email' => $request['email'],
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'phone' => $request['phone'],
                    'lead_source' => $request['source']
                ]);
                $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
            } catch (\Throwable $th) {
                Log::error($th);
            }
        }
        return redirect()->to('/form-completed');
    }
}
