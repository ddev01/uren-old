<header class="start-0 w-full border-b border-gray-200 bg-white p-4 dark:border-gray-600 dark:bg-gray-900">
	<nav>
		<ul class="gap-4 flexb">
			<li class="gap-4 flexy">
				<a class="{{ Route::is('estimate.*') ? 'text-blue-700 dark:text-blue-500' : 'dark:text-white text-black hover:text-blue-700 dark:hover:text-blue-500' }} gap-2 text-lg font-medium flexy" href="{{ route('estimate.index') }}" wire:navigate>
					<img class="size-8" src="{{ asset('images/logo.png') }}" alt="">
					{{ __('Estimate') }}
				</a>
			</li>
			<div class="gap-4 flexy">
				<li class="flexc" x-data="themeSwitcher()" x-init="loadTheme()">
					<button class="rounded-sm p-2" @click="toggleTheme()">
						<div><x-svg class="h-6 w-6 text-gray-600 dark:hidden dark:text-gray-400" icon="moon" /></div>
						<div><x-svg class="hidden h-6 w-6 text-gray-600 dark:block dark:text-gray-400" icon="sun" />
						</div>
					</button>
				</li>
				@guest
					@if (Route::has('login'))
						<li class="nav-item inline-block">
							<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
						</li>
					@endif

					@if (Route::has('register'))
						<li class="nav-item inline-block">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
						</li>
					@endif
				@else
					<x-layouts.profile-dropdown-nav />
				@endguest
			</div>
		</ul>
	</nav>
</header>
