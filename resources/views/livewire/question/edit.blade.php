<div>
    <button wire:click="$toggle('modal')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-500" viewBox="0 0 20 20" fill="currentColor">
            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
        </svg>
    </button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">Edit question</x-slot>
        <x-slot name="content">
            <div class="">
                <x-jet-label for="question" value="Question *" />
                <x-jet-input type="text" id="question" wire:model="question" class="w-full mt-1"/>
                <x-jet-input-error for="question" class="mt-1 text-sm text-red-600" />
            </div>
            <div class="mt-6">
                <x-jet-label for="answer" value="Answer *" />
                <textarea id="answer" wire:model.defer="answer" cols="30" rows="6" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full mt-1"></textarea>
                <x-jet-input-error for="answer" class="mt-1 text-sm text-red-600" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click.defer="$toggle('modal')">{{ __("Cancel") }}</x-jet-secondary-button>
            <x-jet-button wire:click="save" class="ml-4">{{ __("Save changes") }}</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
