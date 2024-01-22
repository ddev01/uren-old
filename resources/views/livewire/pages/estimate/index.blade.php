<div>
    <x-container class="py-4">
        <div>
            <div class="w-full rounded-lg bg-white p-8 shadow-primary dark:bg-gray-800">
                <h1 class="text-xl">{{ __('Create new estimate') }}</h1>
                <form class="mt-2 gap-2 flexy" wire:submit.prevent="create">
                    <div class="w-1/3">
                        <x-flowbite.inputs.input name="create-estimate" placeholder="Enter a name" wire:model="name"
                            prefix="search" prefixFade />
                    </div>
                    <x-flowbite.button type="submit">
                        {{ __('Create') }}
                    </x-flowbite.button>
                </form>
                <div class="mt-16 pb-4 flexb">
                    @php
                        $options = ['Last day', 'Last 7 days', 'Last 30 days', 'Last year', 'All time'];
                        $model = 'dateFilter';
                    @endphp
                    <x-flowbite.inputs.select-radio :datefilter="$dateFilter" :options="$options" :model="$model" />
                    <div class="w-1/3">
                        <x-flowbite.inputs.input name="searchFilter" wire:model.live.debounce.300ms="searchFilter" clear
                            placeholder="Search" prefix="search" prefixFade />
                    </div>
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                        <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="p-4" scope="col">
                                    <div class="flex items-center">
                                        <input
                                            class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                            id="checkbox-all-search" type="checkbox">
                                        <label class="sr-only" for="checkbox-all-search">checkbox</label>
                                    </div>
                                </th>
                                <th class="gap-2 px-6 py-3" scope="col">
                                    <div class="w-fit cursor-pointer gap-2 flexy" wire:click='setSort("name")'>
                                        Estimate name
                                        <div>
                                            <x-svg
                                                class="{{ $sortColumn == 'name' && $sortDirection == 'asc' ? 'text-blue-600 dark:text-blue-500' : '' }} -mb-3 h-4 w-4"
                                                icon="sort-up" />
                                            <x-svg
                                                class="{{ $sortColumn == 'name' && $sortDirection == 'desc' ? 'text-blue-600 dark:text-blue-500' : '' }} -mt-2 h-4 w-4"
                                                icon="sort-down" />
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    <div class="w-fit cursor-pointer gap-2 flexy" wire:click='setSort("updated_at")'>
                                        Updated at
                                        <div>
                                            <x-svg
                                                class="{{ $sortColumn == 'updated_at' && $sortDirection == 'asc' ? 'text-blue-600 dark:text-blue-500' : '' }} -mb-3 h-4 w-4"
                                                icon="sort-up" />
                                            <x-svg
                                                class="{{ $sortColumn == 'updated_at' && $sortDirection == 'desc' ? 'text-blue-600 dark:text-blue-500' : '' }} -mt-2 h-4 w-4"
                                                icon="sort-down" />
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    <div class="w-fit cursor-pointer gap-2 flexy" wire:click='setSort("created_at")'>
                                        Created at
                                        <div>
                                            <x-svg
                                                class="{{ $sortColumn == 'created_at' && $sortDirection == 'asc' ? 'text-blue-600 dark:text-blue-500' : '' }} -mb-3 h-4 w-4"
                                                icon="sort-up" />
                                            <x-svg
                                                class="{{ $sortColumn == 'created_at' && $sortDirection == 'desc' ? 'text-blue-600 dark:text-blue-500' : '' }} -mt-2 h-4 w-4"
                                                icon="sort-down" />
                                        </div>
                                    </div>
                                </th>
                                <th class="px-6 py-3" scope="col">
                                    <div class="w-fit cursor-pointer gap-2 flexy">
                                        Action
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($estimates as $estimate)
                                <tr class="bg-white dark:border-gray-700 dark:bg-gray-800">
                                    <td class="w-4 p-4">
                                        <div class="flex items-center">
                                            <input
                                                class="h-4 w-4 rounded border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-blue-600 dark:focus:ring-offset-gray-800"
                                                id="checkbox-table-search-1" type="checkbox">
                                            <label class="sr-only" for="checkbox-table-search-1">checkbox</label>
                                        </div>
                                    </td>
                                    <th class="px-6 py-4" scope="row">
                                        <a class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                                            href="{{ route('estimate.edit', $estimate->id) }}"
                                            wire:navigate>{{ $estimate->name }}</a>
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $estimate->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $estimate->created_at->diffForHumans() }}
                                    </td>
                                    <td class="gap-4 px-6 py-4 flexy">
                                        <x-flowbite.button href="{{ route('estimate.edit', $estimate->id) }}"
                                            color="green" wire:navigate>
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
                <div class="flex flex-col-reverse justify-center items-center gap-2 mt-6">
                    {{ $this->estimates->links() }}
                </div>
            </div>
        </div>
    </x-container>
</div>
