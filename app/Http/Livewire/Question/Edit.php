<?php

namespace App\Http\Livewire\Question;

use Livewire\Component;
use App\Models\Question;

class Edit extends Component
{
    public $modal, $updatedQuestion, $question, $answer, $page;

    public function mount(Question $q)
    {
        $this->updatedQuestion = $q;
        $this->question = $q->question;
        $this->answer = $q->answer;
    }

    public function render()
    {
        return view('livewire.question.edit');
    }

    public function save()
    {
        $this->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        try {
            $this->updatedQuestion->update([
                'question' => $this->question,
                'answer' => $this->answer,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('admin.page.edit', ['page' => $this->page]);
    }
}
