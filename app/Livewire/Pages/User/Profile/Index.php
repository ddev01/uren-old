<?php

namespace App\Livewire\Pages\User\Profile;

use Livewire\Component;
use Livewire\WithFileUploads; 
use Illuminate\Support\Facades\Auth;
use Usernotnull\Toast\Concerns\WireToast;

class Index extends Component
{
    use WithFileUploads, WireToast;
    public $avatar;
    public $firstName;
    public $companyName;
    public $companyWebsite;

    public function mount()
    {
        $this->firstName = Auth::user()->name;
        $this->companyName = Auth::user()->company_name;
        $this->companyWebsite = Auth::user()->company_website;
    }

    public function uploadAvatar()
    {
        $this->validate([
            'avatar' => 'image|mimes:jpg,jpeg,png,gif|max:5120', // 5MB Max
        ]);

    
        // Store the file and get the hashed name
        $this->avatar->store('avatars', 'public');
        $hashedName = $this->avatar->hashName();
    
        // Prepend the file path to the hashed name
        $filePath = 'avatars/' . $hashedName;
    
        // Update the user's avatar with the file path
        Auth::user()->update(['avatar' => $filePath]);
    }

    public function updateProfile()
    {
        $this->validate([
            'firstName' => 'required|min:3',
            // 'companyName' => '',
            // 'companyWebsite' => 'url',
        ]);

        $user = Auth::user();
        $user->name = $this->firstName ?? $user->name;
        $user->company_name = $this->companyName ?? $user->company_name;
        $user->company_website = $this->companyWebsite ?? $user->company_website;
        $user->save();
        
        toast()->success('Profile updated successfully', __('Profile'))->push();
    }

    public function render()
    {
        return view('livewire.pages.user.profile.index');
    }
}
