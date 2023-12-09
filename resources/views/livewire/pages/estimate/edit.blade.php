@php
    $sectionsJson = json_encode($estimate->sections);
@endphp
<div>
    <x-container class="py-4">
        <div id="estimate-data" x-data="{ estimate: @json($estimate), sections: @json($sections), rows: @json($rows) }">
            <div class="w-full rounded-md bg-gray-700 p-4">
                <div class="flexb">
                    <x-input.input name="name" value="{{ $estimate->name }}" label="name" wire:model="name" />
                    <div class="gap-2 flexy">
                        <x-input.checkbox name="notes" value="{{ $estimate->notes }}" label="notes" wire:model="notes" />
                        <x-input.number name="price" value="{{ $estimate->price }}" label="price" wire:model="price" />
                    </div>
                </div>
                <div class="mt-6">
                    <div class="gap-2 rounded-md bg-amber-700 p-3 flexy">
                        <div class="w-[125px]">Type</div>
                        <div class="w-[60px]">Hours</div>
                        <div class="flex-grow">Title</div>
                        <div class="flex-grow">Description</div>
                        <div class="flex-grow">Notes</div>
                        <div class="w-[90px]">Actions</div>
                    </div>
                    <div x-data="{ sections: {{ $sectionsJson }} }">
                        <template x-for="section in sections" :key="section.id">
                            <div class="relative">
                                <div class="mt-4 gap-2 rounded-md bg-green-800 p-3 flexy">
                                    <div class="w-[125px]">Type</div>
                                    <div class="w-[60px]">Hours</div>
                                    <div class="flex-1" x-text="section.name">Title</div>
                                    <div class="flex-1" x-text="section.description">Description</div>
                                    <div class="flex-1" x-text="section.note">Notes</div>
                                    <div class="w-[90px]">Actions</div>
                                </div>
                                <template x-for="row in section.rows" :key="row.id"> --}}
                                    <div class="gap-2 bg-blue-800 p-3 flexy">
                                        <div class="w-[125px]" x-text="row.type"></div>
                                        <div class="w-[60px]" x-text="row.hours"></div>
                                        <div class="flex-1" x-text="row.name"></div>
                                        <div class="flex-1" x-text="row.description"></div>
                                        <div class="flex-1" x-text="row.note"></div>
                                        <div class="w-[90px]">Actions</div>
                                    </div>
                                </template>
                                <button class="absolute bottom-0 right-0 translate-x-1/2 translate-y-1/2 flexc" @click=""><i class="fa-solid fa-square-plus"></i></button>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </x-container>
</div>
