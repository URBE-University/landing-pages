<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.contact.index', [
            'contacts' => Contact::orderBy('created_at', 'desc')->get(),
        ]);
    }
}
