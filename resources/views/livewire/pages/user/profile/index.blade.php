<x-user.container>
	<div class="grid grid-cols-3 gap-4">
		<div class="flex flex-shrink-0 justify-center rounded-lg bg-white p-8 shadow-primary dark:bg-gray-800">
			<div class="relative h-fit w-fit">
				<img class="box-content size-32 rounded-lg border object-contain p-4 dark:border-gray-700" src="{{ Auth::user()->getAvatar() }}" alt="Profile Photo">
				<input id="avatar" type="file" style="display:none;" wire:model="avatar" x-ref="avatar" x-on:livewire-upload-finish="$wire.uploadAvatar()">
				</form>

				<x-flowbite.button class="mt-6" x-on:click="$refs.avatar.click()">
					<x-svg class="size-4 text-white" icon="upload" />
					{{ __('Change image') }}
				</x-flowbite.button>
				@error('avatar')
					<span class="error text-red-500">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<form class="col-span-2 w-full space-y-5 rounded-lg bg-white p-8 shadow-primary dark:bg-gray-800" wire:submit.prevent='updateProfile'>
			<x-flowbite.inputs.input name="firstName" placeholder="{{ __('Enter your first name') }}" icon="user-2" label="{{ __('Firstname') }}" wire:model="firstName">
				{{-- @slot('helper')
                    This is a helper <a href="#">Helper link</a>
                @endslot --}}
			</x-flowbite.inputs.input>
			<x-flowbite.inputs.input name="companyName" placeholder="{{ __('Enter your companies name') }}" icon="suit" label="{{ __('Company') }}" wire:model="companyName" />
			<x-flowbite.inputs.input name="companyWebsite" placeholder="{{ __('Enter your companies website') }}" icon="globe" label="{{ __('Company website') }}" wire:model="companyWebsite" />
			<x-flowbite.button type="submit">
				{{ __('Submit') }}
			</x-flowbite.button>
		</form>
	</div>
</x-user.container>
