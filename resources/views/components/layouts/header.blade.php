<header class="bg-white dark:bg-gray-800 p-4 text-sm font-medium text-gray-900 dark:text-gray-300  ">
    <nav>
        <ul class="gap-4 flexb">
            <!-- Authentication Links -->
            <li>
                <a class="dark:hover:text-blue-500 hover:text-blue-600" href="{{ route('estimate.index') }}" wire:navigate>
                    {{ __('Estimate') }}
                </a>
            </li>
            <div class="flexy gap-4">
                    <li class="flexc" x-data="themeSwitcher()" x-init="loadTheme()">
                        <button @click="toggleTheme()">
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
