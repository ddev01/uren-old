<header class="bg-white dark:bg-gray-900 p-4 w-full  start-0 border-b border-gray-200 dark:border-gray-600">
    <nav>
        <ul class="gap-4 flexb">
            <li class="flexy gap-4">
                <a class="text-lg flexy gap-2 font-medium {{ Route::is('estimate.*') ? 'text-blue-700 dark:text-blue-500' : 'dark:text-white text-black hover:text-blue-700 dark:hover:text-blue-500' }}"
                    href="{{ route('estimate.index') }}" wire:navigate>
                    <img class="size-8" src="{{ asset('images/logo.png') }}" alt="">
                    {{ __('Estimate') }}
                </a>
            </li>
            <div class="flexy gap-4">
                <li class="flexc" x-data="themeSwitcher()" x-init="loadTheme()">
                    <button @click="toggleTheme()" class="p-2 rounded-sm ">
                        <div><x-svg class="h-6 w-6 text-gray-600 dark:text-gray-400 dark:hidden" icon="moon" /></div>
                        <div><x-svg class="h-6 w-6 text-gray-600 dark:text-gray-400 hidden dark:block" icon="sun" />
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
