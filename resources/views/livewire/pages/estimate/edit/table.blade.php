<div class="text-gray-500 dark:text-gray-400">
	<div class="relative gap-2 overflow-x-auto rounded-md bg-gray-400/20 bg-gray-50 p-3 text-sm font-semibold text-gray-700 shadow-md flexy dark:bg-gray-700 dark:text-gray-400 sm:rounded-lg">
		<div class="w-[125px]">Type</div>
		<div class="w-[60px]">Hours</div>
		<div class="flex-1">Title</div>
		<div class="flex-1">Description</div>
		<div class="flex-1" x-show="showNotes">Notes</div>
		<div class="w-[90px]">Actions</div>
	</div>
	@foreach ($estimate->sections as $section)
		<livewire:pages.estimate.edit.section :section="$section" :key="$section->id" />
	@endforeach
	<livewire:pages.estimate.edit.summary />
</div>
