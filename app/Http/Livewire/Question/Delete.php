<?php

namespace App\Http\Livewire\Question;

use App\Models\Question;
use Livewire\Component;

class Delete extends Component
{
    public $modal, $page, $question;

    public function mount(Question $question){
        $this->question = $question;
    }

    public function render()
    {
        return view('livewire.question.delete');
    }

    public function delete()
    {
        try {
            $this->question->delete();
        } catch (\Throwable $th) {
            throw $th;
        }
        return redirect()->route('admin.page.edit', ['page' => $this->page]);
    }
}
