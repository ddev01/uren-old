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
 * @property \Illuminate\Contracts\Pagination\LengthAwarePaginator $estimates
 */
class Index extends Component
{
    use WireToast, WithPagination;

    public string $name;

    public string $dateFilter = '2';

    public string $searchFilter;

    public string $sortColumn = 'created_at';

    public string $sortDirection = 'desc';

    protected string $paginationTheme = 'flowbite';

    public function mount(): void
    {
        $this->resetPage();
    }

    public function updatingSearchFilter(): void
    {
        $this->resetPage();
    }

    public function updatingDateFilter(): void
    {
        $this->resetPage();
    }

    public function setSort(string $column): void
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortColumn = $column;
        $this->resetPage();
    }

    public function getCurrentFilterLabel(): string
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator<\App\Models\Estimate>
     */
    public function getEstimatesProperty(): \Illuminate\Contracts\Pagination\LengthAwarePaginator
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

    public function create(): void
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

    public function delete(string $id): void
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

    public function render(): \Illuminate\View\View
    {
        return view('livewire.pages.estimate.index', [
            'estimates' => $this->estimates, // Access the computed property here
        ]);
    }
}
