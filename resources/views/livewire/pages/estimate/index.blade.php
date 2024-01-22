<div>
    <x-container class="py-4">
        <div>
            <div class="w-full shadow-primary p-8 rounded-lg bg-white dark:bg-gray-800">
                <h1 class="text-xl">{{ __('Create new estimate') }}</h1>
                <form class="mt-2 gap-2 flexy" wire:submit.prevent="create">
                    <div class="w-1/3">
                        <x-flowbite.inputs.input placeholder="Enter a name" name="create-estimate" wire:model="name"
                            prefix="search" prefixFade />
                    </div>
                    <x-flowbite.button type="submit">
                        {{ __('Create') }}
                    </x-flowbite.button>
                </form>
                <div class="pb-4 flexb mt-8">
                    @php
                        $options = ['Last day', 'Last 7 days', 'Last 30 days', 'Last year', 'All time'];
                        $model = 'dateFilter';
                    @endphp
                    <x-flowbite.inputs.select-radio :datefilter="$dateFilter" :options="$options" :model="$model" />
                    <div class="w-1/3">
                        <x-flowbite.inputs.input wire:model.live.debounce.300ms="searchFilter" clear
                            placeholder="Search" name="searchFilter" prefix="search" prefixFade />
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-all-search" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 gap-2">
                                    <div class="flexy gap-2 cursor-pointer w-fit" wire:click='setSort("name")'>
                                        Estimate name
                                        <div>
                                            <x-svg class="w-4 h-4 -mb-3 {{ $sortColumn == 'name' && $sortDirection == 'asc' ? 'text-blue-600 dark:text-blue-500' : '' }}" icon="sort-up" />
                                            <x-svg class="w-4 h-4 -mt-2 {{ $sortColumn == 'name' && $sortDirection == 'desc' ? 'text-blue-600 dark:text-blue-500' : '' }}" icon="sort-down" />
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flexy gap-2 cursor-pointer w-fit" wire:click='setSort("updated_at")'>
                                        Updated at
                                        <div>
                                            <x-svg class="w-4 h-4 -mb-3 {{ $sortColumn == 'updated_at' && $sortDirection == 'asc' ? 'text-blue-600 dark:text-blue-500' : '' }}" icon="sort-up" />
                                            <x-svg class="w-4 h-4 -mt-2 {{ $sortColumn == 'updated_at' && $sortDirection == 'desc' ? 'text-blue-600 dark:text-blue-500' : '' }}" icon="sort-down" />
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flexy gap-2 cursor-pointer w-fit" wire:click='setSort("created_at")'>
                                        Created at
                                        <div>
                                            <x-svg class="w-4 h-4 -mb-3 {{ $sortColumn == 'created_at' && $sortDirection == 'asc' ? 'text-blue-600 dark:text-blue-500' : '' }}" icon="sort-up" />
                                            <x-svg class="w-4 h-4 -mt-2 {{ $sortColumn == 'created_at' && $sortDirection == 'desc' ? 'text-blue-600 dark:text-blue-500' : '' }}" icon="sort-down" />
                                        </div>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    <div class="flexy gap-2 cursor-pointer w-fit">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($estimates as $estimate)
                                <tr class="bg-white dark:bg-gray-800 dark:border-gray-700">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input id="checkbox-table-search-1" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-6 py-4">
                                        <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                            href="{{ route('estimate.edit', $estimate->id) }}"
                                            wire:navigate>{{ $estimate->name }}</a>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $estimate->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $estimate->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4 flexy gap-4">
                                        <x-flowbite.button color="green"
                                            href="{{ route('estimate.edit', $estimate->id) }}">
                                            Edit
                                        </x-flowbite.button>
                                        <x-flowbite.button color="red" wire:click="delete('{{ $estimate->id }}')">
                                            Delete
                                        </x-flowbite.button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-container>
</div>
