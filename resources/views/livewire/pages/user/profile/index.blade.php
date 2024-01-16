<x-user.container>
    <div class="flex gap-6">
        <div class="relative w-fit h-fit flex-shrink-0">
            <img class="w-[128px] h-[128px] rounded-lg object-contain bg-gray-900 box-content p-4" src="{{ Auth::user()->getAvatar() }}" alt="Profile Photo">
                <input type="file" wire:model="avatar" id="avatar" style="display:none;"
                x-on:livewire-upload-finish="$wire.uploadAvatar()">
            </form>
            <label for="avatar" class="cursor-pointer text-white flexc absolute bg-black w-8 rounded-lg p-1 h-8  bottom-0 right-0 translate-y-1/3 translate-x-1/3">
                <div class="flexc w-6 h-6">
                    <x-svg icon="pencil" />
                </div>
            </label>
            @error('avatar')
                <span class="error text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <form class="p-4 bg-gray-900 w-full rounded-lg space-y-5" wire:submit.prevent='updateProfile'>
            <x-flowbite.inputs.input placeholder="{{ __('Enter your first name') }}" icon="user-2" name="firstName" label="{{ __('Firstname') }}" wire:model="firstName" >
                {{-- @slot('helper')
                    This is a helper <a href="#">Helper link</a>
                @endslot --}}
            </x-flowbite.inputs.input>
            <x-flowbite.inputs.input placeholder="{{ __('Enter your companies name') }}" icon="suit" name="companyName" label="{{ __('Company') }}" wire:model="companyName" />
            <x-flowbite.inputs.input placeholder="{{ __('Enter your companies website') }}" icon="globe" name="companyWebsite" label="{{ __('Company website') }}" wire:model="companyWebsite" />
            <x-flowbite.button type="submit">
                {{ __('Submit') }}
            </x-flowbite.button>
        </form> 
    </div>
</x-user.container>