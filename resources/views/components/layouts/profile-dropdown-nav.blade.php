<li class="relative" x-data="{open:false}">
    <img
        class="h-8 w-8 box-content p-2 bg-gray-900 cursor-pointer rounded-lg object-contain"
        src="{{ Auth::user()->getAvatar() }}"
        type="button"
        alt="User dropdown"
        @click="open = !open"
        @click.away="open = false"
    >
    <div class="z-10 w-44 divide-y divide-gray-100 rounded-lg bg-white shadow dark:divide-gray-600 dark:bg-gray-700 overflow-hidden absolute right-0 translate-y-4 opacity-0 pointer-events-none transition-opacity duration-150 ease-in-out"  :class="open ? 'opacity-100 pointer-events-auto' : '' " >
        <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
            <div>{{ Auth::user()->name }}</div>
        </div>
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
            <li>
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="{{ route('profile') }}" wire:navigate>Profile</a>
            </li>
            <li>
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="#">Dashboard</a>
            </li>
            <li>
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="#">Settings</a>
            </li>
            <li>
                <a class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" href="#">Earnings</a>
            </li>
        </ul>
        <div class="py-1">
            <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Sign out</a>
             <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>
    </div> 
</li>