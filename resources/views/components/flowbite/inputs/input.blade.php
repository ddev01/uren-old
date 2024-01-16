<div class="w-full">
    {{-- dd($name) --}}
    @if ($label)
        <label for="{{ $name }}"
        class="mb-2 block text-sm font-medium 
        @error($name) text-red-700 dark:text-red-500 @else text-gray-900 dark:text-white @enderror
    ">{{ $label }}</label>
    @endif
    <div class="flex">
        @if ($icon)
            <label for="{{ $name }}" 
            class="
                inline-flex items-center rounded-s-md border border-e-0  bg-gray-200 px-3 text-sm text-gray-900  dark:bg-gray-600 dark:text-gray-400
                @error($name) border-red-500  focus:border-red-500 dark:border-red-400 @else border-gray-300 dark:border-gray-600 @enderror
            ">
                <x-svg class="h-4 w-4 text-gray-500 dark:text-gray-400" icon="{{ $icon }}" />
            </label>
        @endif
        <input {{ $attributes }} id="{{ $name }}" type="text"
        class="
            block w-full min-w-0 flex-1  border  bg-gray-50 p-2.5 text-sm text-gray-900 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400  
            {{ $icon ? 'rounded-e-lg' : 'rounded-lg' }}
            @error($name) border-red-500 placeholder-red-700 focus:ring-red-500 focus:border-red-500 dark:border-red-400 
            @else focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:focus:border-blue-500 dark:focus:ring-blue-500 border-gray-300 @enderror
        ">
    </div>
    @error($name)
        <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
    @enderror
    @if($helper)
        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 block input-helper">
            {{ $helper }}
            {{-- CSS has the following styling on a tags with parent .input-helper: --}}
            {{-- <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500"></a> --}}
        </p>
    @endif
</div>