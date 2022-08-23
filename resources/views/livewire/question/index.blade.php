<div>
    @foreach ($questions as $question)
        <div @class([
            'py-2 flex items-center justify-between',
            'border-b' => !$loop->last
        ])>
            <div class="font-medium text-slate-800">{{ $question->question }}</div>
            <div class="flex items-center space-x-2">
                @livewire('question.edit', ['q' => $question->id, 'page' => $page->id], key('edit_' . $page->id))
                @livewire('question.delete', ['question' => $question->id, 'page' => $page->id], key('delete_' . $page->id))
            </div>
        </div>
    @endforeach
</div>
