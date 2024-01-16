
<div {{ $attributes->merge(['class' => 'w-full md:max-w-[1140px] md:mx-auto mt-10']) }}>
    <div class="md:flex">
        <ul class="flex-column space-y space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:me-4 mb-4 md:mb-0">
            <li>
                <a href="{{ route('profile') }}" wire:navigate class="inline-flex gap-2 items-center px-4 py-3 rounded-lg  w-full {{ Route::is('profile')  ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                    <x-svg icon="user" />
                    Profile
                </a>
            </li>
            <li>
                <a href="#" class="inline-flex gap-2 items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    <x-svg icon="dashboard" />
                    Dashboard
                </a>
            </li>
            <li class="space-y-2">
                <a href="{{ route('settings.general') }}" wire:navigate class="inline-flex gap-2 items-center px-4 py-3 rounded-lg  w-full {{ Route::is('settings.*')  ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white'}}">
                   <x-svg icon="settings" />
                    Settings
                </a>
                <ul class="pl-4 space-y-2">
                    <li>
                        <a href="{{ route('settings.general') }}" wire:navigate class="inline-flex scale-95 gap-2 items-center px-4 py-3 rounded-lg  w-full {{ Route::is('settings.general')  ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white '}}">
                            <x-svg icon="settings" />
                            General
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settings.estimate') }}" wire:navigate class="inline-flex scale-95 gap-2 items-center px-4 py-3 rounded-lg  w-full {{ Route::is('settings.estimate')  ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white '}}">
                            <x-svg icon="estimate" />
                            Estimate
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" class="inline-flex gap-2 items-center px-4 py-3 rounded-lg hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                    <x-svg icon="contact" />
                    Contact
                </a>
            </li>
        </ul>
        <div class="w-full">
            {{ $slot }}
        </div>
    </div>
</div>
