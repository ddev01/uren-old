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
		<input class="no-spinners h-full min-h-[40px] w-full rounded-sm bg-gray-800 px-4 py-2 focus:outline-none" id="{{ $name }}" name="{{ $name }}" type="number" {{ $attributes }}>
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
