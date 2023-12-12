<div class="relative" data-position="{{ $section->position }}" x-data="{
    'sectionHours': 21,
    calculateTotal: function() {
        let total = 0;
        $el.querySelectorAll('.row-hours input').forEach((el) => {
            let value = el.value ? parseInt(el.value) : 0;
            total += value;
        });
        this.sectionHours = total;
    },
}">
    <div class="mt-4 gap-2 rounded-t-md bg-green-800 p-3 flexy">
        <div class="w-[125px]"></div>
        <div class="w-[60px]" x-text="sectionHours"></div>
        <button @click="calculateTotal">calc hours</button>
        <div class="flex-1">
            <x-input.input name="name" wire:model.lazy="name" />
        </div>
        <div class="flex-1">
            <x-input.input name="description" wire:model.lazy="description" />
        </div>
        <div class="flex-1" x-show="showNotes">
            <x-input.input name="note" wire:model.lazy="note" />
        </div>
        <div class="w-[90px] flexb">
            <button class="fa-solid fa-square-minus" wire:click="sectionDelete"></button>
            <button class="fa-solid fa-clone" wire:click="sectionDuplicate"></button>
            <button class="fa-solid fa-angle-up" wire:click="sectionUp"></button>
            <button class="fa-solid fa-angle-down" wire:click="sectionDown"></button>

        </div>
    </div>
    @foreach ($section->rows as $row)
        <livewire:pages.estimate.edit.row :row="$row" :key="$row->id" />
    @endforeach
    <div class="hidden" x-init="calculateTotal"></div>
    <button class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 flexc" wire:click="pushRow">
        <i class="fa-solid fa-square-plus"></i></button>
    <button class="right-left absolute bottom-0 -translate-x-1/2 translate-y-1/2 flexc" wire:click="pushSection">
        <i class="fa-solid fa-square-plus"></i>
    </button>
</div>
