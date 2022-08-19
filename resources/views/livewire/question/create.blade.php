<div>
    <x-jet-button wire:click="$toggle('modal')">Add question</x-jet-button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">Add question</x-slot>
        <x-slot name="content">
            <div class="">
                <x-jet-label for="question" value="Question *" />
                <x-jet-input type="text" id="question" wire:model="question" class="w-full mt-1"/>
                <x-jet-input-error for="question" class="mt-1 text-sm text-red-600" />
            </div>
            <div class="mt-6">
                <x-jet-label for="answer" value="Answer *" />
                <textarea id="answer" wire:model="answer" cols="30" rows="6" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full mt-1"></textarea>
                <x-jet-input-error for="answer" class="mt-1 text-sm text-red-600" />
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">Cancel</x-jet-secondary-button>
            <x-jet-button wire:click="save" class="ml-4">Save question</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
