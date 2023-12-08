<?php

namespace App\Livewire\Pages\Estimate;

use Livewire\Component;
use App\Models\Estimate;
use App\Models\EstimateSection;
use App\Models\EstimateSectionRow;

class Index extends Component
{
    public $estimates;
    public $name;

    public function create()
    {
        $estimate = Estimate::create([
            'name' => $this->name,
            'user_id' => auth()->id(),
        ]);

        $section = EstimateSection::create([
            'estimate_id' => $estimate->id,
        ]);

        EstimateSectionRow::create([
            'estimate_section_id' => $section->id,
        ]);

        $this->estimates = Estimate::all();
    }

    public function delete($id)
    {
        $estimate = Estimate::find($id);
        $estimate->delete();

        $this->estimates = Estimate::all();
    }

    public function mount()
    {
        $this->estimates = Estimate::all();
    }

    public function render()
    {
        return view('livewire.pages.estimate.index', [
            'estimates' => $this->estimates,
        ]);
    }
}
