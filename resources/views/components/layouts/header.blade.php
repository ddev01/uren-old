<header class="bg-gray-800">
    <nav>
        <ul class="gap-4 p-4 flexb">
            <!-- Authentication Links -->
            <li>
                <a wire:navigate href="{{ route('estimate.index') }}">
                    {{ __('Estimate') }}
                </a>
            </li>
            <div>
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="">
                        {{-- <a>
                        {{ Auth::user()->name }}
                    </a> --}}

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form class="d-none" id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </div>
        </ul>
    </nav>
</header>
