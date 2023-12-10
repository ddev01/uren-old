<div>
    <x-container class="py-4">
        <div x-data="{ showNotes: @entangle('showNotes') }">
            <div class="w-full rounded-md bg-gray-700 p-4">
                <div class="flexb">
                    <x-input.input name="name" label="name" wire:model.lazy="name" />
                    <div class="gap-2 flexy">
                        <x-input.checkbox name="notes" label="notes" wire:model="showNotes" wire:change="handleShowNotesChange" />
                        <x-input.number name="price" label="price" wire:model.lazy="price" />
                    </div>
                </div>
                <div class="mt-6">
                    <livewire:pages.estimate.edit.table :estimate="$estimate" :key="$estimate->id" />
                </div>
            </div>
        </div>
    </x-container>
</div>
