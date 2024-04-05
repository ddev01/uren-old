<?php

namespace App\Livewire\Pages\Estimate\Edit;

use Livewire\Component;

class Section extends Component
{
    public $section;

    public $name;

    public $description;

    public $note;

    protected $listeners = [
        'sectionRerender' => 'render',
    ];

    public function mount($section)
    {
        $this->section = $section;
        $this->name = $this->section->name;
        $this->description = $this->section->description;
        $this->note = $this->section->note;
    }

    public function updatedName()
    {
        $this->section->name = $this->name;
        $this->section->save();
    }

    public function updatedDescription()
    {
        $this->section->description = $this->description;
        $this->section->save();
    }

    public function updatedNote()
    {
        $this->section->note = $this->note;
        $this->section->save();
    }

    public function pushRow()
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

    public function pushSection()
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

    public function sectionDelete()
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

    public function sectionUp()
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
            $this->section->position = $this->section->position - 1;
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

    public function sectionDown()
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
            $this->section->position = $this->section->position + 1;
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

    public function sectionDuplicate()
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
        foreach ($this->section->rows as $row) {
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

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.pages.estimate.edit.section');
    }
}
