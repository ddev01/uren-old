@props([
    'options' => [],
    'model' => null,
    'datefilter' => null,
])
<div class="relative" x-data="{ open: false }">
    <button id="dropdownRadioButton" @click="open=!open"
        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
        type="button">
        <x-svg icon="clock" class="w-3 h-3 text-gray-500 dark:text-gray-400 me-3" />
        Last 30 days
        <x-svg icon="chevron-down" class="w-2.5 h-2.5 ms-2.5" />
    </button>

    <div id="dropdownRadio" @click.away="open=false"
        class="z-10 w-48 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600 absolute inset-x-auto translate-y-3"
        x-cloak x-show="open">
        <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
            @foreach ($options as $i => $option)
                <li>
                    <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                        <input id="filter-radio-{{ $i }}" type="radio" value="{{ $i }}"
                            name="filter-radio" {{ $model ? 'wire:model.lazy=' . $model : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="filter-radio-{{ $i }}"
                            class="w-full ms-2 text-sm font-medium text-gray-900 rounded dark:text-gray-300">{{ $option }}</label>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
