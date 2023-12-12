<div class="{{ $attributes['class'] }}">
    @if ($label)
        <label class="" for="{{ $name }}">{{ $label }}</label>
    @endif
    <div class="relative flex h-full items-end">
        @if ($prefix ?? false)
            <div class="absolute left-[8px] top-0">
                {{ $prefix }}
            </div>
        @endif
        <div class="relative h-fit w-fit flexc">
            <input
                class="no-spinners aspect-square h-full min-h-[40px] rounded-sm bg-gray-800 px-4 py-2 focus:outline-none"
                id="{{ $name }}"
                name="{{ $name }}"
                type="checkbox"
                style="appearance: none"
                {{ $attributes }}
            >
        </div>
        @if ($suffix ?? false)
            <div class="absolute right-[8px] top-0">
                {{ $suffix }}
            </div>
        @endif
    </div>
    @error($name)
        <div class="">
            {{ $message }}
        </div>
    @enderror
</div>
