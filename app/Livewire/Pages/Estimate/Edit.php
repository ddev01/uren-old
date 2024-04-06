<?php

namespace App\Livewire\Pages\Estimate;

use App\Models\Estimate;
use Livewire\Component;

class Edit extends Component
{
    public Estimate $estimate;

    public bool $showNotes;

    public string $name;

    public float $price;

    public bool $public;

    public function mount(Estimate $estimate): void
    {
        $this->estimate = $estimate;
        $this->showNotes = $this->estimate->show_notes;
        $this->name = $this->estimate->name;
        $this->price = $this->estimate->hourly_rate;
        $this->public = $this->estimate->public;
    }

    public function updatedPublic(): void
    {
        $this->estimate->public = $this->public;
        $this->estimate->save();
    }

    public function handleShowNotesChange(): void
    {
        $this->estimate->show_notes = $this->showNotes;
        $this->estimate->save();
    }
    // public function handlePublicChange()
    // {
    //     $this->estimate->public = $this->public;
    //     $this->estimate->save();
    // }

    public function updatedName(): void
    {
        $this->estimate->name = $this->name;
        $this->estimate->save();
    }

    public function updatedPrice(): void
    {
        $this->estimate->hourly_rate = $this->price;
        $this->estimate->save();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.pages.estimate.edit');
    }
}
