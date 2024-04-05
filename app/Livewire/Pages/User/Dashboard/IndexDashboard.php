<?php

namespace App\Livewire\Pages\User\Dashboard;

use Livewire\Component;

class IndexDashboard extends Component
{
    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.pages.user.dashboard.index-dashboard');
    }
}
