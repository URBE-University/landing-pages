<div>
    @foreach ($questions as $question)
        <div @class([
            'py-2 flex items-center justify-between',
            'border-b' => !$loop->last
        ])>
            <div class="font-medium text-slate-800">{{ $question->question }}</div>
            <div class="">
                @livewire('question.delete', ['question' => $question->id, 'page' => $page->id], key($page->id))
            </div>
        </div>
    @endforeach
</div>
