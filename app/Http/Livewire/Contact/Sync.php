<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use App\Mail\ContactToHubspotFails;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Sync extends Component
{
    public function render()
    {
        return view('livewire.contact.sync');
    }

    public function sync()
    {
        $hubSpot = \HubSpot\Factory::createWithAccessToken( config('urbe.hubspot.token') );
        foreach (Contact::all() as $contact) {
            // Search by email to avoid duplicates
            $filter = new \HubSpot\Client\Crm\Contacts\Model\Filter();
            $filter->setOperator('EQ')
                ->setPropertyName('email')
                ->setValue($contact->email);
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
                        'email' => $contact->email,
                        'firstname' => $contact->firstname,
                        'lastname' => $contact->lastname,
                        'phone' => $contact->phone,
                        'lead_source' => $contact->lead_source,
                        'program_of_interest' => $contact->program_of_interest ?? $contact->source,
                        'zip' => $contact->zip,
                        'hs_lead_status' => 'NEW'
                    ]);
                    $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
                } catch (\Throwable $th) {
                    Log::error($th);
                    // Add Email notification when it fails to send to Hubspot
                    Mail::to(config('urbe.support.email'))->send( new ContactToHubspotFails() );
                }
            }
            // Hubspot Search API only supports 4 requests per second
            // So, we sleep every .25 seconds to prevent the sync from failing.
            sleep(.5);
        }

        return redirect()->route('admin.contact.index');
    }
}
