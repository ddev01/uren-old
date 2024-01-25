<li class="relative" x-data="{ open: false }">
	<img class="box-content h-8 w-8 cursor-pointer rounded-lg object-contain p-2" src="{{ Auth::user()->getAvatar() }}" type="button" alt="User dropdown" @click="open = !open" @click.away="open = false">
	<div class="pointer-events-none absolute right-0 z-10 w-44 translate-y-4 divide-y divide-gray-100 overflow-hidden rounded-lg bg-white opacity-0 shadow transition-opacity duration-150 ease-in-out dark:divide-gray-600 dark:bg-gray-700" :class="open ? 'opacity-100 pointer-events-auto' : ''">
		<div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
			<div>{{ Auth::user()->name }}</div>
		</div>
		<ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
			<li>
				<a class="{{ Route::is('profile') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' }} block px-4 py-2" href="{{ route('profile') }}" wire:navigate>Profile</a>
			</li>
			<li>
				<a class="{{ Route::is('dashboard') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' }} block px-4 py-2" href="{{ route('dashboard') }}">Dashboard</a>
			</li>
			<li>
				<a class="{{ Route::is('settings.*') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' }} block px-4 py-2" href="{{ route('settings') }}">Settings</a>
			</li>
			<li>
				<a class="{{ Route::is('contact') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white' }} block px-4 py-2" href="{{ route('contact') }}">Contact</a>
			</li>
		</ul>
		<div class="py-1">
			<a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-600 dark:hover:text-white" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">Sign
				out</a>
			<form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
				@csrf
			</form>
		</div>
	</div>
</li>
