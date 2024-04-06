<?php

namespace App\Livewire\Pages\Estimate\Edit;

use App\Models\EstimateSection;
use Livewire\Component;

/**
 * Livewire component for editing estimate sections.
 */
class Section extends Component
{
    public EstimateSection $section;

    public ?string $name = null;
    public ?string $description = null;
    public ?string $note = null;

    /**
     * @var array<string, string>
     */
    protected $listeners = [
        'sectionRerender' => '$refresh',
    ];

    /**
     * Mount the component.
     *
     * @param  EstimateSection  $section  The section to be edited.
     */
    public function mount(EstimateSection $section): void
    {
        $this->section = $section;
        $this->name = $section->name;
        $this->description = $section->description;
        $this->note = $section->note;
    }

    /**
     * Update the name of the section.
     */
    public function updatedName(): void
    {
        $this->section->update(['name' => $this->name]);
    }

    /**
     * Update the description of the section.
     */
    public function updatedDescription(): void
    {
        $this->section->update(['description' => $this->description]);
    }

    /**
     * Update the note of the section.
     */
    public function updatedNote(): void
    {
        $this->section->update(['note' => $this->note]);
    }

    /**
     * Add a new row to the section.
     */
    public function pushRow(): void
    {
        $this->section->rows()->create([
            'type' => 'default',
            'hours' => 0,
            'name' => '',
            'description' => '',
            'note' => '',
            'position' => $this->section->rows()->count(),
        ]);
    }

    /**
     * Add a new section after the current one.
     */
    public function pushSection(): void
    {
        // Increments the position of sections that have positions more than $this->section
        $this->section->estimate
            ->sections()
            ->where('position', '>', $this->section->position)
            ->increment('position');

        // creating new section with position 1 more than $this->section
        $newSection = $this->section->estimate->sections()->create([
            'name' => '',
            'position' => $this->section->position + 1,
        ]);
        $newSection->rows()->create([
            'type' => 'default',
            'hours' => 0,
            'name' => '',
            'description' => '',
            'note' => '',
            'position' => 0,
        ]);
        $this->dispatch('tableRerender');
    }

    /**
     * Delete the current section.
     */
    public function sectionDelete(): void
    {
        // Decrements the position of sections that have positions higher than $this->section
        $this->section->estimate
            ->sections()
            ->where('position', '>', $this->section->position)
            ->decrement('position');
        $this->section->delete();

        // If there are no sections left, create a new section
        if ($this->section->estimate->sections()->count() == 0) {
            $newSection = $this->section->estimate->sections()->create([
                'name' => '',
                'position' => 0,
            ]);
            $newSection->rows()->create([
                'type' => 'default',
                'hours' => 0,
                'name' => '',
                'description' => '',
                'note' => '',
                'position' => 0,
            ]);
        }

        //Dispatch an even to table component to rerender the sections
        $this->dispatch('tableRerender');
    }

    /**
     * Move the section up in the order.
     */
    public function sectionUp(): void
    {
        // If the section is not the first section
        if ($this->section->position > 0) {
            // Get the section above the current section
            $sectionAbove = $this->section->estimate
                ->sections()
                ->where('position', $this->section->position - 1)
                ->first();

            // Swap the positions of the two sections
            $sectionAbove->position = $this->section->position;
            $sectionAbove->save();
            $this->section->position -= 1;
            $this->section->save();
        } elseif ($this->section->position == 0) {
            $this->section->estimate
                ->sections()
                ->where('position', '>', 0)
                ->decrement('position');
            $this->section->position = $this->section->estimate->sections()->count() - 1;
            $this->section->save();
        }

        // Dispatch an event to table component to rerender the sections
        $this->dispatch('tableRerender');
    }

    /**
     * Move the section down in the order.
     */
    public function sectionDown(): void
    {
        // If the section is not the last section
        if ($this->section->position < $this->section->estimate->sections()->count() - 1) {
            // Get the section below the current section
            $sectionBelow = $this->section->estimate
                ->sections()
                ->where('position', $this->section->position + 1)
                ->first();

            // Swap the positions of the two sections
            $sectionBelow->position = $this->section->position;
            $sectionBelow->save();
            $this->section->position += 1;
            $this->section->save();
        } elseif ($this->section->position == $this->section->estimate->sections()->count() - 1) {
            $this->section->estimate
                ->sections()
                ->where('position', '<', $this->section->estimate->sections()->count() - 1)
                ->increment('position');
            $this->section->position = 0;
            $this->section->save();
        }

        // Dispatch an event to table component to rerender the sections
        $this->dispatch('tableRerender');
    }

    /**
     * Duplicate the current section.
     */
    public function sectionDuplicate(): void
    {
        // Increments the position of sections that have positions more than $this->section
        $this->section->estimate
            ->sections()
            ->where('position', '>', $this->section->position)
            ->increment('position');

        // creating new section with position 1 more than $this->section
        $newSection = $this->section->estimate->sections()->create([
            'name' => $this->section->name,
            'description' => $this->section->description,
            'note' => $this->section->note,
            'position' => $this->section->position + 1,
        ]);
        /** @var \Illuminate\Database\Eloquent\Collection<int, \App\Models\EstimateSectionRow> */
        $rows = $this->section->rows;
        foreach ($rows as $row) {
            $newSection->rows()->create([
                'type' => $row->type,
                'hours' => $row->hours,
                'name' => $row->name,
                'description' => $row->description,
                'note' => $row->note,
                'position' => $row->position,
            ]);
        }
        $this->dispatch('tableRerender');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.pages.estimate.edit.section');
    }
}
