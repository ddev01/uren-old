<div class="relative">
    <div class="mt-4 gap-2 rounded-t-md bg-green-800 p-3 flexy">
        <div class="w-[125px]"></div>
        <div class="w-[60px]"></div>
        <div class="flex-1">
            <x-input.input name="name" wire:model.lazy="name" />
        </div>
        <div class="flex-1">
            <x-input.input name="description" wire:model.lazy="description" />
        </div>
        <div class="flex-1" x-show="showNotes">
            <x-input.input name="note" wire:model.lazy="note" />
        </div>
        <div class="w-[90px]">
            <i class="fa-solid fa-square-minus" wire:click="deleteSection"></i>
        </div>
    </div>
    @foreach ($section->rows as $row)
        <livewire:pages.estimate.edit.row :row="$row" :key="$row->id" />
    @endforeach
    <button class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 flexc" wire:click="pushRow">
        <i class="fa-solid fa-square-plus"></i></button>
    <button class="right-left absolute bottom-0 -translate-x-1/2 translate-y-1/2 flexc" wire:click="pushSection">
        <i class="fa-solid fa-square-plus"></i>
    </button>
</div>
