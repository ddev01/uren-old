<?php

namespace App\Livewire\Pages\Estimate;

use App\Models\Estimate;
use App\Models\EstimateSection;
use App\Models\EstimateSectionRow;
use Carbon\Carbon;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

/**
 * @property-read \Illuminate\Pagination\LengthAwarePaginator $estimates Computed property for getting estimates.
 */
class Index extends Component
{
    use WireToast, WithPagination;

    public $name;

    public $dateFilter = '2';

    public $searchFilter;

    public $sortColumn = 'created_at';

    public $sortDirection = 'desc';

    protected $paginationTheme = 'flowbite';

    public function mount()
    {
        $this->resetPage(); // Reset the pagination after updating the filters
    }

    public function updatingSearchFilter()
    {
        $this->resetPage();
    }

    public function updatingDateFilter()
    {
        $this->resetPage();
    }

    public function setSort($column)
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
        $this->resetPage();
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

    /**
     * Get the estimates based on filters.
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getEstimatesProperty()
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
        if (! empty($this->searchFilter)) {
            $query->where('name', 'like', '%' . $this->searchFilter . '%');
        }

        return $query->orderBy($this->sortColumn, $this->sortDirection)->paginate(10);
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

            toast()
                ->success('Created successfully', 'Estimate')
                ->push();
        } catch (Exception $e) {
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
        } catch (Exception $e) {
            toast()
                ->danger('Something went wrong', 'Estimate')
                ->push();
        }
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.pages.estimate.index', [
            'estimates' => $this->estimates, // Access the computed property here
        ]);
    }
}
