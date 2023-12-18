<div>
    <x-container class="py-4">
        <div x-data="{
            showNotes: @entangle('showNotes'),
            hourlyRate: @entangle('price'),
            'defaultHours': 0,
            'optionalHours': 0,
            'onceFee': 0,
            'monthlyFee': 0,
            'yearlyFee': 0,
            tableTotal: function() {
                let defaultHours = 0;
                let optionalHours = 0;
                let onceFee = 0;
                let monthlyFee = 0;
                let yearlyFee = 0;
                $el.querySelectorAll('.row-wrapper').forEach((el) => {
                    let rowType = el.querySelector('[name=row-type]').value;
                    let rowHours = el.querySelector('[name=row-hours]').value;
                    console.log(rowType, rowHours);
                    if (rowType && rowHours != '') {
                        if (rowType == 'default') {
        
                            defaultHours += parseInt(rowHours);
                        }
                        if (rowType == 'optional') {
                            optionalHours += parseInt(rowHours);
                        }
                        if (rowType == 'once') {
                            onceFee += parseInt(rowHours);
                        }
                        if (rowType == 'monthly') {
                            monthlyFee += parseInt(rowHours);
                        }
                        if (rowType == 'yearly') {
                            yearlyFee += parseInt(rowHours);
                        }
                    }
                });
                this.defaultHours = defaultHours;
                this.optionalHours = optionalHours;
                this.onceFee = onceFee;
                this.monthlyFee = monthlyFee;
                this.yearlyFee = yearlyFee;
            }
        }">
            <div class="w-full rounded-md p-4">
                <div class="flexb">
                    <x-input.input name="name" label="name" wire:model.lazy="name" />
                    <div class="gap-2 flexy">
                        <x-modal.primary>
                            <x-slot name="button">
                                <i class="fa-solid fa-user-plus fa-xl"></i>
                            </x-slot>
                            test
                        </x-modal.primary>
                        <x-input.checkbox name="public" label="public" wire:model.lazy="public" :checked="$public == '1'" />
                        <x-input.checkbox
                            name="notes"
                            label="notes"
                            wire:model="showNotes"
                            wire:change="handleShowNotesChange"
                            :checked="$showNotes == '1'"
                        />
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
