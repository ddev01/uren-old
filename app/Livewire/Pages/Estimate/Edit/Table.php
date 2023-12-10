<?php

namespace App\Livewire\Pages\Estimate\Edit;

use Livewire\Component;

class Table extends Component
{
    public $estimate;

    protected $listeners = [
        'sectionDeleted' => 'render',
        'sectionAdded' => 'render',
    ];

    public function render()
    {
        return view('livewire.pages.estimate.edit.table');
    }
}
