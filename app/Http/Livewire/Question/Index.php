<?php

namespace App\Http\Livewire\Question;

use App\Models\Page;
use Livewire\Component;

class Index extends Component
{
    public $questions;
    public function mount(Page $page)
    {
        $this->questions = $page->questions;
    }

    public function render()
    {
        return view('livewire.question.index');
    }
}
