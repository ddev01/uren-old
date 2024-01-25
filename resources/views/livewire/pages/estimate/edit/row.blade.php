<div class="row-wrapper flex h-full gap-2 bg-gray-600 p-3" x-data="{ tallestInput: 0 }">
	<div class="h-full w-[125px]">
		<x-input.select name="row-type" wire:model.lazy="type" x-on:change="sectionTotal(); tableTotal();">
			<option value="default">Default</option>
			<option value="optional">Optional</option>
			<option value="subheading">Subheading</option>
			<option value="once">One time payment</option>
			<option value="monthly">Monthly</option>
			<option value="yearly">Yearly</option>
		</x-input.select>
	</div>
	<div class="h-full w-[60px]">
		<x-input.number class="row-hours" name="row-hours" x-on:change="sectionTotal(); tableTotal();" x-ref="rowHours" wire:model.lazy="displayHours" />
	</div>
	<div class="h-full flex-1">
		<x-input.estimate.textarea name="row-name" wire:model.lazy="name" />
	</div>
	<div class="h-full flex-1">
		<x-input.estimate.textarea name="row-description" wire:model.lazy="description" />
	</div>
	<div class="flex-1" x-show="showNotes">
		<x-input.estimate.textarea name="row-notes" wire:model.lazy="note" />
	</div>
	<div class="w-[90px] p-1 flexb">
		<i class="fa-solid fa-square-minus" wire:click="rowDelete"></i>
		<button class="fa-solid fa-clone" wire:click="rowDuplicate"></button>
		<button class="fa-solid fa-angle-up" wire:click="rowUp"></button>
		<button class="fa-solid fa-angle-down" wire:click="rowDown"></button>
	</div>
</div>
