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
            try {
                $contactInput = new \HubSpot\Client\Crm\Contacts\Model\SimplePublicObjectInput();
                $contactInput->setProperties([
                    'email' => $contact->email,
                    'firstname' => $contact->firstname,
                    'lastname' => $contact->lastname,
                    'phone' => $contact->phone,
                    'lead_source' => $contact->lead_source,
                    'zip' => $contact->zip
                ]);
                $hubSpot->crm()->contacts()->basicApi()->create($contactInput);
            } catch (\Throwable $th) {
                Log::error($th);
                // Add Email notification when it fails to send to Hubspot
                Mail::to(config('urbe.support.email'))->send( new ContactToHubspotFails() );
            }
        }

        return redirect()->route('admin.contact.index');
    }
}
