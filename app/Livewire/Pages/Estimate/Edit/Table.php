<?php

namespace App\Livewire\Pages\Estimate\Edit;

use Livewire\Component;

class Table extends Component
{
    public object $estimate;

    /**
     * @var array<string, string>
     */
    protected $listeners = [
        'tableRerender' => 'render',
    ];

    public function render(): \Illuminate\View\View
    {
        return view('livewire.pages.estimate.edit.table');
    }
}
