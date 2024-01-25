<x-user.container>
    <div class="grid grid-cols-3 gap-4">
        <div class="flex-shrink-0  shadow-primary p-8 rounded-lg bg-white dark:bg-gray-800 flex justify-center">
            <div class="w-fit h-fit relative">
                <img class="size-32 rounded-lg object-contain border dark:border-gray-700 box-content p-4"
                    src="{{ Auth::user()->getAvatar() }}" alt="Profile Photo">
                <input type="file" wire:model="avatar" id="avatar" style="display:none;" x-ref="avatar"
                    x-on:livewire-upload-finish="$wire.uploadAvatar()">
                </form>

                <x-flowbite.button class="mt-6" x-on:click="$refs.avatar.click()">
                    <x-svg class="text-white size-4" icon="upload" />
                    {{ __('Change image') }}
                </x-flowbite.button>
                @error('avatar')
                    <span class="error text-red-500">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <form class="p-8 bg-white dark:bg-gray-800 w-full rounded-lg space-y-5 col-span-2  shadow-primary"
            wire:submit.prevent='updateProfile'>
            <x-flowbite.inputs.input placeholder="{{ __('Enter your first name') }}" icon="user-2" name="firstName"
                label="{{ __('Firstname') }}" wire:model="firstName">
                {{-- @slot('helper')
                    This is a helper <a href="#">Helper link</a>
                @endslot --}}
            </x-flowbite.inputs.input>
            <x-flowbite.inputs.input placeholder="{{ __('Enter your companies name') }}" icon="suit"
                name="companyName" label="{{ __('Company') }}" wire:model="companyName" />
            <x-flowbite.inputs.input placeholder="{{ __('Enter your companies website') }}" icon="globe"
                name="companyWebsite" label="{{ __('Company website') }}" wire:model="companyWebsite" />
            <x-flowbite.button type="submit">
                {{ __('Submit') }}
            </x-flowbite.button>
        </form>
    </div>
</x-user.container>
