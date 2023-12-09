<?php

namespace App\Livewire\Pages\Estimate;

use Livewire\Component;
use App\Models\Estimate;
use App\Models\EstimateSection;
use App\Models\EstimateSectionRow;
use Usernotnull\Toast\Concerns\WireToast;


class Index extends Component
{
    use WireToast;
    public $estimates;
    public $name;


    public function create()
    {
        try {
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

            toast()
                ->success('Created successfully', 'Estimate')
                ->push();
        } catch (\Exception $e) {
            toast()
                ->danger('Something went wrong', 'Estimate')
                ->push();
        }
    }

    public function delete($id)
    {
        try {
            $estimate = Estimate::find($id);
            $estimate->delete();
            toast()
                ->success('Deleted successfully', 'Estimate')
                ->push();
        } catch (\Exception $e) {
            toast()
                ->danger('Something went wrong', 'Estimate')
                ->push();
        }
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
