<x-user.container>
	<div class="grid grid-cols-3 gap-4">
		<x-user.container-section>
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
		</x-user.container-section>
		<x-user.container-section class="col-span-2">
			<form class="space-y-4" wire:submit.prevent='updateProfile'>
				<x-flowbite.inputs.input name="firstName" placeholder="{{ __('Enter your first name') }}" icon="user-2" label="{{ __('Firstname') }}" wire:model="firstName">
				</x-flowbite.inputs.input>
				<x-flowbite.inputs.input name="companyName" placeholder="{{ __('Enter your companies name') }}" icon="suit" label="{{ __('Company') }}" wire:model="companyName" />
				<x-flowbite.inputs.input name="companyWebsite" placeholder="{{ __('Enter your companies website') }}" icon="globe" label="{{ __('Company website') }}" wire:model="companyWebsite" />
				<x-flowbite.button type="submit">
					{{ __('Submit') }}
				</x-flowbite.button>
			</form>
		</x-user.container-section>
	</div>
</x-user.container>
