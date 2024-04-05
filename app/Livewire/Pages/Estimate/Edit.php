<?php

namespace App\Livewire\Pages\Estimate;

use App\Models\Estimate;
use Livewire\Component;

class Edit extends Component
{
    public $estimate;

    public $showNotes;

    public $name;

    public $price;

    public $public;

    public function mount(Estimate $estimate)
    {
        $this->estimate = $estimate;
        $this->showNotes = $this->estimate->show_notes;
        $this->name = $this->estimate->name;
        $this->price = $this->estimate->hourly_rate;
        $this->public = $this->estimate->public;
    }

    public function updatedPublic()
    {
        $this->estimate->public = $this->public;
        $this->estimate->save();
    }

    public function handleShowNotesChange()
    {
        $this->estimate->show_notes = $this->showNotes;
        $this->estimate->save();
    }
    // public function handlePublicChange()
    // {
    //     $this->estimate->public = $this->public;
    //     $this->estimate->save();
    // }

    public function updatedName()
    {
        $this->estimate->name = $this->name;
        $this->estimate->save();
    }

    public function updatedPrice()
    {
        $this->estimate->hourly_rate = $this->price;
        $this->estimate->save();
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('livewire.pages.estimate.edit');
    }
}
