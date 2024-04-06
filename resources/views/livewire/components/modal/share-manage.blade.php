<div class="grid grid-cols-2 gap-10">
	<div>
		<h2 class="text-xl">Add a user so they can view this estimate</h2>
		<form class="mt-4" wire:submit.prevent="submit">
			<x-input.input class="w-2/3" name="email" label="email" wire:model="email" />
			@if (session()->has('message'))
				<div class="text-green-500">
					{{ session()->get('message') }}
				</div>
			@endif
			<div class="mt-4 flex items-end gap-4">
				<x-button class="mt-4" type="submit">Add user</x-button>
				<x-input.checkbox name="sendmail" wire:model.lazy="sendMail" label="{{ __('Send email') }}" />
			</div>
		</form>
	</div>
	<div>
		<h2 class="text-xl">Users who can view this estimate</h2>

		@if ($sharedUsers)
			<div class="mt-6 flex flex-col divide-y divide-gray-400">
				@foreach ($sharedUsers as $sharedUser)
					{{-- <div>{{ $sharedUser }}</div> --}}
					<div class="px-2 py-2 flexb">
						<div>{{ $sharedUser }}</div>
						<i class="fa-solid fa-user-xmark cursor-pointer transition-all hover:scale-110 hover:text-red-500 hover:opacity-90" wire:click="deleteSharedUser('{{ $sharedUser }}')"></i>
					</div>
				@endforeach
			</div>
		@else
			<div class="mt-3 text-xs text-gray-400">No users have been added yet</div>
		@endif
	</div>
</div>
