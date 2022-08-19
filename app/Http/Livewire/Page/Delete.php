<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;

class Delete extends Component
{
    public $page, $modal;

    public function mount(Page $page){$this->page = $page;}

    public function render()
    {
        return view('livewire.page.delete');
    }

    public function delete()
    {
        try {
            $this->page->delete();
            $message = "Page successfully deleted!";
            $style = "success";
        } catch (\Throwable $th) {
            info($th);
            $message = "Error while removing page. Contact support for assistance.";
            $style = "danger";
        }
        session()->flash('flash.banner', $message);
        session()->flash('flash.bannerStyle', $style);
        return redirect()->route('admin.page.index');
    }
}
