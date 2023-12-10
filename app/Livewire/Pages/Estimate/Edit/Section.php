<?php

namespace App\Livewire\Pages\Estimate\Edit;

use Livewire\Component;

class Section extends Component
{
    public $section;

    public $name;

    public $description;

    public $note;

    // lifecycle hook to initialize the component
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

    protected $listeners = [
        'rowDeleted' => 'render',
    ];

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
        $this->section->estimate->sections()
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
        $this->dispatch('sectionAdded');
    }

    public function deleteSection()
    {
        $this->section->delete();
        $this->dispatch('sectionDeleted');
    }

    //    public function deleteRow($rowId)
    //    {
    //        $this->section->rows()->find($rowId)->delete();
    //        $this->render();
    //    }

    public function render()
    {
        return view('livewire.pages.estimate.edit.section');
    }
}
