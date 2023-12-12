<div>
    <div class="gap-2 rounded-md bg-amber-700 p-3 flexy">
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
