<?php

namespace App\Livewire\Pages\User\Settings\General;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class IndexGeneral extends Component
{
    use WireToast;

    public string $currentPassword;

    public string $newPassword;

    public string $newPasswordConfirmation;

    public function changePassword(): void
    {
        $this->validate([
            'currentPassword' => 'required',
            'newPassword' => [
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'newPasswordConfirmation' => 'required|same:newPassword',
        ]);

        User::find(auth()->id())->update([
            'password' => bcrypt($this->newPassword),
        ]);

        $this->reset(['currentPassword', 'newPassword', 'newPasswordConfirmation']);

        toast()
            ->success(__('Changed succesfully!'), __('Password'))
            ->push();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.pages.user.settings.general.index-general');
    }
}
