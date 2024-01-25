<div {{ $attributes->merge(['class' => 'h-full']) }}>
	@if ($label)
		<label class="" for="{{ $name }}">{{ $label }}</label>
	@endif
	<div class="relative h-full">
		@if ($prefix ?? false)
			<div class="absolute left-[8px] top-0">
				{{ $prefix }}
			</div>
		@endif
		<textarea class="estimate-textarea h-full min-h-[40px] w-full resize-y overflow-auto rounded-sm bg-gray-800 px-4 py-2 focus:outline-none" id="{{ $name }}" name="{{ $name }}" {{ $attributes }} x-data="{
    resize: () => {
        $el.style.minHeight = $el.scrollHeight + 'px';
    }
}" x-init="setTimeout(function() { resize() }, 100);" @input="resize()"></textarea>
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
