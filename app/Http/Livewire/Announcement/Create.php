<?php

namespace App\Http\Livewire\Announcement;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Log;

class Create extends Component
{
    public $modal, $semester, $starts_at;

    public function render()
    {
        return view('livewire.announcement.create');
    }

    public function save()
    {
        $this->validate([
            'semester' => 'required',
            'starts_at' => 'required|date',
        ]);

        try {
            Announcement::create([
                'semester' => $this->semester,
                'starts_at' => $this->starts_at
            ]);
            $message = 'Date successfully added!';
            $style = 'success';
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $message = 'Oops! We ran into an issue and were not able to add the date.';
            $style = 'danger';
        }

        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
        return redirect()->route('admin.announcement.index');
    }
}
