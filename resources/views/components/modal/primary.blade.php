<div x-data="{ modal: false }">
	@if ($button)
		<button @click="modal=true;bodyScroll=false">
			{{ $button }}
		</button>
	@endif
	<div class="fixed inset-0 z-1 bg-black/50" x-show="modal" x-cloak>
		<div class="fixed left-1/2 top-1/2 z-1 h-[75vh] w-[75vw] -translate-x-1/2 -translate-y-1/2 rounded-md bg-gray-700 p-8" @click.away="modal=false; bodyScroll=true">
			<i class="fa-solid fa-xmark fa-xl absolute right-4 top-6 aspect-square cursor-pointer transition-all hover:scale-110 hover:opacity-90" @click="modal=false; bodyScroll=true"></i>
			{{ $slot }}
		</div>
	</div>
</div>
