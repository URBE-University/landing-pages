<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Delete extends Component
{
    public $modal, $contact;

    public function mount(Contact $contact)
    {
        $this->contact = $contact;
    }
    public function render()
    {
        return view('livewire.contact.delete');
    }

    public function trash()
    {
        $this->contact->delete();
    }
}
