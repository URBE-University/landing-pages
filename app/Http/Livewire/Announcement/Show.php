<?php

namespace App\Http\Livewire\Announcement;

use App\Models\Announcement;
use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.announcement.show', [
            'event' => Announcement::where('starts_at', '>', today())->first()
        ]);
    }
}
