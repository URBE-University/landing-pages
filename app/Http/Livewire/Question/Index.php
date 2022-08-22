<?php

namespace App\Http\Livewire\Question;

use App\Models\Page;
use Livewire\Component;

class Index extends Component
{
    public $page, $questions;
    public function mount(Page $page)
    {
        $this->page = $page;
        $this->questions = $page->questions;
    }

    public function render()
    {
        return view('livewire.question.index');
    }
}
