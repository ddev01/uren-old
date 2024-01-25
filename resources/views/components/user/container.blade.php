<div {{ $attributes->merge(['class' => 'w-full md:max-w-[1140px] md:mx-auto mt-10']) }}>
	<div class="md:flex">
		<ul class="flex-column space-y mb-4 space-y-4 text-sm font-medium text-gray-500 dark:text-gray-400 md:mb-0 md:me-4">
			<li>
				<a class="{{ Route::is('profile') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }} inline-flex w-full items-center gap-2 rounded-lg px-4 py-3" href="{{ route('profile') }}" wire:navigate>
					<x-svg icon="user" />
					Profile
				</a>
			</li>
			<li>
				<a class="{{ Route::is('dashboard') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }} inline-flex w-full items-center gap-2 rounded-lg px-4 py-3" href="{{ route('dashboard') }}" wire:navigate>
					<x-svg icon="dashboard" />
					Dashboard
				</a>
			</li>
			<li class="space-y-2">
				<a class="{{ Route::is('settings.*') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }} inline-flex w-full items-center gap-2 rounded-lg px-4 py-3" href="{{ route('settings.general') }}" wire:navigate>
					<x-svg icon="settings" />
					Settings
				</a>
				<ul class="space-y-2 pl-4">
					<li>
						<a class="{{ Route::is('settings.general') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white ' }} inline-flex w-full scale-95 items-center gap-2 rounded-lg px-4 py-3" href="{{ route('settings.general') }}" wire:navigate>
							<x-svg icon="settings" />
							General
						</a>
					</li>
					<li>
						<a class="{{ Route::is('settings.estimate') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white ' }} inline-flex w-full scale-95 items-center gap-2 rounded-lg px-4 py-3" href="{{ route('settings.estimate') }}" wire:navigate>
							<x-svg icon="estimate" />
							Estimate
						</a>
					</li>
				</ul>
			</li>
			<li>
				<a class="{{ Route::is('contact') ? 'dark:bg-blue-600 bg-blue-700 text-white' : 'hover:text-gray-900 bg-white shadow-primary hover:bg-gray-100 w-full dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white' }} inline-flex w-full items-center gap-2 rounded-lg px-4 py-3" href="{{ route('contact') }}" wire:navigate>
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
