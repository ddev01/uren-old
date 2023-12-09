<?php

namespace App\Livewire\Pages\Estimate;

use App\Models\Estimate;
use Livewire\Component;

class Edit extends Component
{
    public $estimate;

    public function mount(Estimate $estimate)
    {
        $this->estimate = $estimate;
    }

    public function data($estimate)
    {
        $rowsArray = [];

        foreach ($estimate->sections as $section) {
            array_push($rowsArray, $section->rows);
        }

        return [
            'estimate' => $estimate,
            'sections' => $estimate->sections,
            'rows' => $rowsArray,
        ];
    }

    public function render()
    {
        return view('livewire.pages.estimate.edit', $this->data($this->estimate));
    }
}
