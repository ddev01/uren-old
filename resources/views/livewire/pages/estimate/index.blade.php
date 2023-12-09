<div>
    <x-container class="py-4">
        <div>
            <div class="w-full rounded-md bg-gray-700 p-4">
                <h1 class="text-xl">{{ __('Create new estimate') }}</h1>
                <form class="mt-2 gap-2 flexy" wire:submit.prevent="create">
                    <x-input.input name="create-estimate" wire:model="name" />
                    <x-button type="submit">
                        {{ __('Create') }}
                    </x-button>
                </form>
                <div class="space-y-4 mt-6">
                    @foreach ($estimates as $estimate)
                        <div class="flexb">
                            <a href="{{ route('estimate.edit', $estimate->id) }}" wire:navigate>{{ $estimate->name }}</a>
                            <span class="text-gray-500 text-sm">{{ $estimate->created_at->diffForHumans() }}</span>
                            <span class="text-gray-500 text-sm">{{ $estimate->updated_at->diffForHumans() }}</span>
                            <div class="gap-4 flexy">
                                <x-button class="" href="{{ route('estimate.edit', $estimate->id) }}">Edit</x-button>
                                <x-button class="bg-red-500" wire:click="delete('{{ $estimate->id }}')">Delete</x-button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-container>
</div>
