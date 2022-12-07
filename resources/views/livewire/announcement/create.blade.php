<div>
    <x-jet-button wire:click="$toggle('modal')">{{ __("New Date") }}</x-jet-button>

    <x-jet-dialog-modal wire:model="modal">
        <x-slot name="title">New start date</x-slot>
        <x-slot name="content">
            <div class="">
                <x-jet-label for="semester" value="Semester"/>
                <x-jet-input type="text" id="semester" wire:model="semester" placeholder="Fall A" class="w-full mt-1"/>
                <x-jet-input-error for="semester"/>
            </div>
            <div class="mt-6">
                <x-jet-label for="starts_at" value="Starts at"/>
                <x-jet-input type="date" id="starts_at" wire:model="starts_at" placeholder="Fall A" class="w-full mt-1"/>
                <x-jet-input-error for="starts_at"/>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modal')">Cancel</x-jet-secondary-button>
            <x-jet-button wire:click.prevent="save" class="ml-4">Add date</x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
