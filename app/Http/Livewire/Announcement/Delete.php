<?php

namespace App\Http\Livewire\Announcement;

use Livewire\Component;
use App\Models\Announcement;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{
    public $modal, $announcement;

    public function mount(Announcement $start)
    {
        $this->announcement = $start;
    }

    public function delete()
    {
        try {
            $this->announcement->delete();
            $message = 'Date successfully deleted!';
            $style = 'success';
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            $message = 'Oops! We ran into an issue and were not able to delete the date.';
            $style = 'danger';
        }

        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
        return redirect()->route('admin.announcement.index');
    }

    public function render()
    {
        return view('livewire.announcement.delete');
    }
}
