<div class="relative mt-8 shadow-md sm:rounded-lg" data-position="{{ $section->position }}" x-data="{
    'sectionHours': 21,
    sectionTotal: function() {
        let total = 0;
        $el.querySelectorAll('.row-wrapper').forEach((el) => {
            let rowType = el.querySelector('[name=row-type]').value;
            if (rowType && ['default', 'optional', 'custom'].includes(rowType)) {
                let rowHours = el.querySelector('[name=row-hours]').value;
                if (rowHours && rowHours != '') {
                    total += parseInt(rowHours);
                }
            }
        });
        this.sectionHours = total;
    },
}">
	<div class="gap-3 rounded-t-md border-b bg-gray-100 p-3 text-xs uppercase text-gray-700 flexy dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400">

		<div class="w-[125px]"></div>
		<div class="w-[60px] px-4" x-text="sectionHours"></div>
		{{--        <button @click="tableTotal">calc hours</button> --}}
		<div class="flex-1">
			<x-flowbite.inputs.input name="name" wire:model.lazy="name" />
		</div>
		<div class="flex-1">
			<x-flowbite.inputs.input name="description" wire:model.lazy="description" />
		</div>
		<div class="flex-1" x-show="showNotes">
			<x-flowbite.inputs.input name="note" wire:model.lazy="note" />
		</div>
		<div class="text-md w-[90px] p-1 flexb">
			<button class="fa-solid fa-square-minus" wire:click="sectionDelete" @click="tableTotal"></button>
			<button class="fa-solid fa-clone" wire:click="sectionDuplicate" @click="tableTotal"></button>
			<button class="fa-solid fa-angle-up" wire:click="sectionUp"></button>
			<button class="fa-solid fa-angle-down" wire:click="sectionDown"></button>

		</div>
	</div>

	<div class="divide-y">
		@foreach ($section->rows as $row)
			<livewire:pages.estimate.edit.row :row="$row" :key="$row->id" />
		@endforeach
	</div>
	<div class="hidden" x-init="sectionTotal"></div>
	<button class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 flexc" wire:click="pushRow">
		<i class="fa-solid fa-square-plus"></i></button>
	<button class="right-left absolute bottom-0 -translate-x-1/2 translate-y-1/2 flexc" wire:click="pushSection">
		<i class="fa-solid fa-square-plus"></i>
	</button>
</div>
