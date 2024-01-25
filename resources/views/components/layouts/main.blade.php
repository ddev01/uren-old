<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link type="image/x-icon" href="{{ asset('images/logo.png') }}" rel="icon">
    <script>
        // Set theme ASAP to avoid FOUC
        (function() {
            var theme = localStorage.getItem('theme');
            var isDarkMode = theme === 'dark' || (!theme && window.matchMedia('(prefers-color-scheme: dark)').matches);
            if (isDarkMode) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    <script src="https://kit.fontawesome.com/d06677cf57.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body x-data="{ bodyScroll: true }" :class="{ 'overflow-y-hidden': !bodyScroll }" class="bg-gray-50 dark:bg-gray-900 overflow-x-hidden font-geist text-black dark:text-white min-h-[100dvh] min-w-max">
    <livewire:toasts />
    @yield('main')
    @livewireScripts
</body>
</html>
