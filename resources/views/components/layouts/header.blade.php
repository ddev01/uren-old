<header class="bg-white dark:bg-gray-900 p-4 w-full  start-0 border-b border-gray-200 dark:border-gray-600">
    <nav>
        <ul class="gap-4 flexb">
            <li>
                <a class="text-lg font-medium {{ Route::is('estimate.*') ? 'text-blue-700 dark:text-blue-500' : 'dark:text-white text-black hover:text-blue-700 dark:hover:text-blue-500'}}" href="{{ route('estimate.index') }}" wire:navigate>
                    {{ __('Estimate') }}
                </a>
            </li>
            <div class="flexy gap-4">
                    <li class="flexc" x-data="themeSwitcher()" x-init="loadTheme()">
                        <button @click="toggleTheme()" class="p-2 rounded-sm bg-gray-800/75">
                            <x-svg class="h-6 w-6 text-white dark:text-black" icon="moon" />
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
