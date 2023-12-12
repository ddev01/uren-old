<div class="gap-2 bg-blue-800 p-3 flexy" data-position="">
    <div class="w-[125px]">
        <x-input.select name="row-type" wire:model.lazy="type">
            <option value="default">Default</option>
            <option value="optional">optional</option>
            <option value="subheading">Subheading</option>
            <option value="monthly">Monthly</option>
        </x-input.select>
    </div>
    <div class="w-[60px]">
        <x-input.number
            class="row-hours"
            name="row-hours"
            x-on:input="calculateTotal"
            x-ref="rowHours"
            wire:model.lazy="displayHours"
        />
    </div>
    <div class="flex-1">
        <x-input.input name="row-name" wire:model.lazy="name" />
    </div>
    <div class="flex-1">
        <x-input.input name="row-description" wire:model.lazy="description" />
    </div>
    <div class="flex-1" x-show="showNotes">
        <x-input.input name="row-notes" wire:model.lazy="note" />
    </div>
    <div class="w-[90px] flexb">
        <i class="fa-solid fa-square-minus" wire:click="rowDelete"></i>
        <button class="fa-solid fa-clone" wire:click="rowDuplicate"></button>
        <button class="fa-solid fa-angle-up" wire:click="rowUp"></button>
        <button class="fa-solid fa-angle-down" wire:click="rowDown"></button>
    </div>
</div>
