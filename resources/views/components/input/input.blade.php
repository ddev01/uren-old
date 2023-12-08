
<div class="{{ $attributes['class'] }}">
    @if ($label)
        <label class="" for="{{ $name }}">{{ $label }}</label>
    @endif
    <div class="relative h-full">
        @if ($prefix ?? false)
            <div class="absolute left-[8px] top-0">
                {{ $prefix }}
            </div>
        @endif
        <input class="rounded-sm bg-gray-800 h-full py-2 px-4 focus:outline-none min-h-[40px]" name="{{ $name }}" {{ $attributes }}>
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
