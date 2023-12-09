{{-- <div class="pointer-events-auto z-50 cursor-pointer select-none overflow-hidden rounded-md bg-white p-5 shadow hover:bg-gray-50 ltr:border-l-8 rtl:border-r-8 dark:bg-black dark:hover:bg-gray-900" x-bind:class="{
    'border-blue-700': toast.type === 'info',
    'border-green-700': toast.type === 'success',
    'border-yellow-700': toast.type === 'warning',
    'border-red-700': toast.type === 'danger'
}">
    <div class="flex items-center justify-between space-x-5 rtl:space-x-reverse">
        <div class="flex-1 ltr:mr-2 rtl:ml-2">
            <div class="font-large mb-1 text-lg font-black uppercase tracking-widest text-gray-900 dark:text-gray-100" x-html="toast.title" x-show="toast.title !== undefined"></div>

            <div class="text-gray-900 dark:text-gray-200" x-show="toast.message !== undefined" x-html="toast.message"></div>
        </div>

        @include('tall-toasts::includes.icon')
    </div>
</div> --}}
<div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
    <div class="p-4">
        <div class="flex items-start">
            <div class="flex-shrink-0 text-2xl">
                @include('tall-toasts::includes.icon')
            </div>
            <div class="ml-3 w-0 flex-1  pt-0.5">
                <p class="text-sm font-medium text-gray-900" x-html="toast.title" x-show="toast.title !== undefined"></p>
                <p class="text-sm text-gray-500" x-show="toast.message !== undefined" x-html="toast.message"></p>
            </div>
            <div class="ml-4 flex flex-shrink-0">
                <button class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" type="button">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" aria-hidden="true" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
