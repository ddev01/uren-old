<div x-data="{ modal: true }">
    @if ($button)
        <button @click="modal=true;bodyScroll=false">
            {{ $button }}
        </button>
    @endif
    <div class="fixed inset-0 z-1 bg-black/50" x-show="modal" x-cloak>
        <div class="fixed left-1/2 top-1/2 z-1 h-[75vh] w-[75vw] -translate-x-1/2 -translate-y-1/2 rounded-md bg-gray-700 p-8" @click.away="modal=false; bodyScroll=true">
            <i @click="modal=false; bodyScroll=true" class="hover:scale-110 hover:opacity-90 transition-all fa-solid fa-xmark fa-xl absolute top-6 right-4 cursor-pointer aspect-square"></i>
            {{ $slot }}
        </div>
    </div>
</div>
