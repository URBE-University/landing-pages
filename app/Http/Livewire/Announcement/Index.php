<?php

namespace App\Http\Livewire\Announcement;

use App\Models\Announcement;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.announcement.index', [
            'startDates' => Announcement::orderBy('starts_at', 'ASC')->get(),
        ]);
    }
}
