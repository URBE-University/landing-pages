<div>
    <button wire:click="$toggle('modal')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
        </svg>
    </button>

    <x-jet-confirmation-modal wire:model="modal">
        <x-slot name="title">Deleting question</x-slot>
        <x-slot name="content">
            <p>Are you sure you want to delete this question? This action cannot be undone.</p>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">Cancel</x-jet-secondary-button>
            <x-jet-danger-button wire:click="delete" class="ml-4">Delete question</x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
