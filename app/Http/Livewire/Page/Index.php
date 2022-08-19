<?php

namespace App\Http\Livewire\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.page.index', [
            'pages' => Page::paginate(),
        ]);
    }
}
