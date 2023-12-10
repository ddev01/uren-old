<?php

namespace App\Livewire\Pages\Estimate\Edit;

use Livewire\Component;

class Row extends Component
{
    public $row;

    public $type;

    public $hours;

    public $name;

    public $description;

    public $note;

    public function mount($row)
    {
        $this->row = $row;
        $this->type = $this->row->type;
        $this->hours = $this->row->hours;
        $this->name = $this->row->name;
        $this->description = $this->row->description;
        $this->note = $this->row->note;

    }

    public function updatedType()
    {
        $this->row->type = $this->type;
        $this->row->save();
    }

    public function updatedHours()
    {
        $this->row->hours = $this->hours;
        $this->row->save();
    }

    public function updatedName()
    {
        $this->row->name = $this->name;
        $this->row->save();
    }

    public function updatedDescription()
    {
        $this->row->description = $this->description;
        $this->row->save();
    }

    public function updatedNote()
    {
        $this->row->note = $this->note;
        $this->row->save();
    }

    public function deleteRow()
    {
        $this->row->delete();
        $this->dispatch('rowDeleted');
    }

    public function render()
    {
        return view('livewire.pages.estimate.edit.row');
    }
}
