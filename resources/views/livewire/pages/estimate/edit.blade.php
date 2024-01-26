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
					<div class="flex w-full items-end gap-6">
						<x-flowbite.inputs.input name="name" width="w-1/3" label="name" wire:model.lazy="name" />
						<x-flowbite.button href="{{ route('estimate.pdf', $estimate) }}">PDF </x-flowbite.button>

					</div>
					<div class="flex items-end gap-6">
						<div class="gap-6 flexy">
							<x-modal.primary>
								<x-slot name="button">
									<i class="fa-solid fa-user-plus fa-xl" :class="{ 'text-green-500': <?php echo $estimate->public == 1 ? 'true' : 'false'; ?> }"></i>
								</x-slot>
								<livewire:components.modal.share-manage :estimate="$estimate" />
							</x-modal.primary>
							<div class="flex flex-col justify-end">
								<div class="gap-2 flexb">
									<span>{{ __('public') }}</span>
									<input class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800" id="checkbox-table-search-1" type="checkbox" wire:model.lazy="public" :checked="$public == '1'">
								</div>
								<div class="gap-2 flexb">
									<span>{{ __('Notes') }}</span>
									<input class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800" id="checkbox-table-search-1" type="checkbox" ire:model="showNotes" wire:change="handleShowNotesChange" :checked="$showNotes == '1'">
								</div>
							</div>
						</div>

						<x-flowbite.inputs.input name="price" type="number" width="w-fit" label="price" wire:model.lazy="price" />
					</div>
				</div>
				<div class="mt-6">
					<livewire:pages.estimate.edit.table :estimate="$estimate" :key="$estimate->id" />
				</div>
			</div>
		</div>
	</x-container>
</div>
