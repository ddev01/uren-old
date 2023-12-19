<div class="grid grid-cols-2 gap-10">
    <div>
        <h2 class="text-xl">Add a user so they can view this estimate</h2>
        <form class="mt-4" wire:submit.prevent="submit">
            <x-input.input class="w-2/3" name="email" label="email" wire:model="email" />
            @if (session()->has('message'))
                <div class="text-green-500">
                    {{ session()->get('message') }}
                </div>
            @endif
            <x-button class="mt-4" type="submit">Add user</x-button>
        </form>
    </div>
    <div>
        <h2 class="text-xl">Users who can view this estimate</h2>

        @if (!$sharedUsers->isEmpty())
            <div class="flex flex-col divide-y divide-gray-400 mt-6">
                @foreach ($sharedUsers as $sharedUser)
                    {{-- <div>{{ $sharedUser }}</div> --}}
                    <div class="flexb py-2 px-2">
                        <div>{{ $sharedUser }}</div>
                        <i class="hover:scale-110 hover:opacity-90 transition-all fa-solid fa-user-xmark cursor-pointer hover:text-red-500" wire:click="deleteSharedUser('{{ $sharedUser }}')"></i>
                    </div>
                @endforeach
            </div>
        @else
            <div class="mt-3 text-xs text-gray-400">No users have been added yet</div>
        @endif
    </div>
</div>
