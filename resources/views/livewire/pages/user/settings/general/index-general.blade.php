<x-user.container>
	<div class="grid grid-cols-2 gap-4">

		<x-user.container-section>
			<form class="space-y-4" wire:submit.prevent='changePassword'>
				<x-flowbite.inputs.input name="currentPassword" type="password" autocomplete="current-password" placeholder="{{ __('Enter your current password') }}" icon="key" label="{{ __('Current password') }}" wire:model="currentPassword" />
				<x-flowbite.inputs.input name="newPassword" type="password" autocomplete="new-password" placeholder="{{ __('Enter a new password') }}" icon="key" label="{{ __('New password') }}" wire:model="newPassword" />
				<x-flowbite.inputs.input name="newPasswordConfirmation" type="password" autocomplete="new-password" placeholder="{{ __('Confirm your new password') }}" icon="key" label="{{ __('Confirm new password') }}" wire:model="newPasswordConfirmation" />
				{{-- Hidden username field for passwordmanagers --}}
				<div class="hidden">
					<x-flowbite.inputs.input name="username" autocomplete="username" />
				</div>
				@if ($errors->any())
					<ul class="list-inside list-decimal pl-4 -indent-4 text-sm text-red-500">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				@endif
				<x-flowbite.button class="!mt-8" type="submit">
					{{ __('Submit') }}
				</x-flowbite.button>
			</form>
		</x-user.container-section>

	</div>
</x-user.container>
