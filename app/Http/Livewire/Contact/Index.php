<?php

namespace App\Http\Livewire\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.contact.index', [
            'contacts' => Contact::orderBy('created_at', 'desc')->paginate(10),
        ]);
    }
}
