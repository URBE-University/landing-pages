<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;

class Create extends Component
{
    public $modal, $question, $answer, $page;
    public function render()
    {
        return view('livewire.question.create');
    }

    public function save()
    {
        $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        try {
            Question::create([
                'page_id' => $this->page,
                'question' => $this->question,
                'answer' => $this->answer,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('admin.page.edit', ['page' => $this->page]);
    }
}
