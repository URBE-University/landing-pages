<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactToDBFailed;
use App\Mail\ContactToHubspotFails;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotifyMarketingOfNewLead;

class PageController extends Controller
{
    /**
     * Display the landing page or return 404 if doesn't exist
     */
    public function show($page)
    {
        if ($page !== 'request-information') {
            $page = Page::where('slug', $page)->where('status', 1)->firstorfail();
            $options = [
                    'title' => $page->title,
                    'about' => $page->about,
                    'source' => $page->source,
                    'alt_phone' => $page->alt_phone,
                    'cover' => $page->cover,
                    'document_en_url' => $page->document_en_url,
                    'document_es_url' => $page->document_es_url,
                    'questions' => $page->questions,
                    'lock_docs' => $page->lock_docs,
                ];
                if ($page->template == 'classic-es') {
                    App::setLocale('es');
                }
                return view('web.templates.'.$page->template, $options);
        } else {
            return view('web.templates.request-information');
        }
    }

    /**
     * Submit form to Hubspot
     */
    public function sendToHubspot(Request $request)
    {
        $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'email:rfc,spoof,dns'],
            'phone' => ['required'],
            'source' => ['required'],
        ]);

        // Create the contact on the database
        try {
            Contact::firstOrCreate(
                [ 'email' => $request['email'] ],
                [
                    'firstname' => $request['firstname'],
                    'lastname' => $request['lastname'],
                    'phone' => $request['phone'],
                    'lead_source' => $request['source'],
                    'program_of_interest' => $request['program_of_interest'] ?? $request['source'],
                    'zip' => $request['zip']
                ]
            );
        } catch (\Throwable $th) {
            Log::error($th);
            Mail::to(config('urbe.support.email'))->send(
                new ContactToDBFailed(
                    $request['email'],
                    $request['firstname'] . ' ' . $request['lastname'],
                    $request['phone'],
                    $request['source'],
                    $request['program_of_interest'] ?? $request['source'],
                    $request['zip']
                )
            );
        }

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

        $properties = [
            'email' => $request['email'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'phone' => $request['phone'],
            'lead_source' => $request['source'],
            'zip' => $request['zip'],
            'program_of_interest' => $request['program_of_interest'],
            'hs_lead_status' => 'NEW',
            'hs_analytics_source' => 'PAID_SEARCH'
        ];

        // Create lead if doesn't already exist in database
        if ((integer) $contactsPage->getTotal() < 1) {
            try {
                $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
                $contactInput->setProperties($properties);
                $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
                Mail::to(config('urbe.marketing.email'))->send( new NotifyMarketingOfNewLead(
                    $request['firstname'],
                    $request['lastname'],
                    $request['phone'],
                    $request['email'],
                    $request['zip'],
                    $request['source']
                ) );
            } catch (\Throwable $th) {
                Log::error($th);
                // Add Email notification when it fails to send to Hubspot
                Mail::to(config('urbe.support.email'))->send( new ContactToHubspotFails() );
            }
        } else {
            // Update the existing contact
            $contact_id = $contactsPage->getResults()[0]['id'];
            $SimplePublicObjectInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
            $SimplePublicObjectInput->setProperties($properties);
            $hubSpot->crm()->contacts()->basicApi()->update($contact_id, $SimplePublicObjectInput);
        }

        return redirect()->route('form.success', [
            'source' => $request['source'],
        ]);
    }

    /**
     * Redirects user when form submitted
     */
    public function formSuccess($source)
    {
        if ($source === 'lp-request-information') {
            return redirect()->to('https://urbe.university/academics?utm_source=lp-request-informaiton');
        } else {
            $page = Page::where('source', $source)->where('status', 1)->firstorfail();
            return view('web.success', [
                'title' => $page->title,
                'source' => $page->source,
                'lock_docs' => $page->lock_docs,
                'doc_en_url' => ($page->lock_docs === 1 && $page->document_en_url) ? $page->document_en_url : null,
                'doc_es_url' => ($page->lock_docs === 1 && $page->document_es_url) ? $page->document_es_url : null,
            ]);
        }
    }
}
