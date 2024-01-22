<?php

namespace App\Livewire\Pages\Estimate;

use Carbon\Carbon;
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
    public $dateFilter = '2';
    public $searchFilter;
    public $sortBy;
    public $sortColumn = 'created_at';
    public $sortDirection = 'desc';

    public function mount()
    {
        $this->estimates = Estimate::where('user_id', auth()->id())->get()->sortByDesc('created_at');
        $this->filterResults(); // Initialize with filtered results
    }
    // public function updatedSearchFilter()
    // {
    //     $this->filterResults(); // Call this method whenever searchFilter changes
    // }
    // public function updatedDateFilter()
    // {
    //     // dd($this->dateFilter);

    //     $this->filterResults(); // Call this method whenever dateFilter changes
    // }
    public function update($name, $value)
    {
        dd($name, $value);
    }

    public function setSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
        $this->filterResults();
    }

    public function getCurrentFilterLabel()
    {
        $labels = [
            '0' => 'Last day',
            '1' => 'Last 7 days',
            '2' => 'Last 30 days',
            '3' => 'Last year',
            '4' => 'All time',
        ];

        return $labels[$this->dateFilter] ?? 'Unknown';
    }

    private function filterResults()
    {
        $query = Estimate::where('user_id', auth()->id());

        // Apply date filter
        switch ($this->dateFilter) {
            case '0':
                $query->where('created_at', '>=', Carbon::now()->subDay());
                break;
            case '1':
                $query->where('created_at', '>=', Carbon::now()->subDays(7));
                break;
            case '2':
                $query->where('created_at', '>=', Carbon::now()->subDays(30));
                break;
            case '3':
                $query->where('created_at', '>=', Carbon::now()->subYear());
                break;
            // No default case needed for 'all time' as it doesn't filter by date
        }

        // Apply search filter
        if (!empty($this->searchFilter)) {
            $query->where(function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->searchFilter . '%')
                         // Add other fields you want to search by
                         // ->orWhere('other_field', 'like', '%' . $this->searchFilter . '%')
                         ;
            });
        }
        $query->orderBy($this->sortColumn, $this->sortDirection);
        $this->estimates = $query->get();
    }

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

   
    

    public function render()
    {
        $results = $this->filterResults();
        return view('livewire.pages.estimate.index', [
            'estimates' => $this->estimates,
            'results' => $results,
        ]);
    }
}
