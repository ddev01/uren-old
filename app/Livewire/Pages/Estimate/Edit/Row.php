<?php

namespace App\Livewire\Pages\Estimate\Edit;

use App\Models\EstimateSectionRow;
use Livewire\Component;

class Row extends Component
{
    public EstimateSectionRow $row;

    public string $type;

    public ?float $hours;

    public float|string|null $displayHours;

    public ?string $name;

    public ?string $description;

    public ?string $note;

    public function mount(EstimateSectionRow $row): void
    {
        $this->row = $row;
        $this->type = $this->row->type;
        if ($this->row->hours == 0) {
            $this->displayHours = '';
        } else {
            $this->displayHours = $this->row->hours;
        }
        $this->name = $this->row->name;
        $this->description = $this->row->description;
        $this->note = $this->row->note;
    }

    public function updatedType(): void
    {
        $this->row->type = $this->type;
        $this->row->save();
    }

    public function updatedDisplayHours(): void
    {
        if ($this->displayHours == '') {
            $this->hours = 0;
        } else {
            $this->hours = $this->displayHours;
        }
        $this->row->hours = $this->hours;
        $this->row->save();
    }

    public function updatedHours(): void
    {
        if ($this->hours == '') {
            $this->hours = 0;
        } else {
            $this->row->hours = $this->hours;
        }
        $this->row->save();
    }

    public function updatedName(): void
    {
        $this->row->name = $this->name;
        $this->row->save();
    }

    public function updatedDescription(): void
    {
        $this->row->description = $this->description;
        $this->row->save();
        $this->render();
    }

    public function updatedNote(): void
    {
        $this->row->note = $this->note;
        $this->row->save();
    }

    public function rowDelete(): void
    {
        $this->row->delete();
        $this->dispatch('sectionRerender');
    }

    public function rowUp(): void
    {
        //If it's not first we can decrement its position and increment the position of the row above it
        if ($this->row->position > 0) {
            $this->row->section
                ->rows()
                ->where('position', $this->row->position - 1)
                ->increment('position');
            $this->row->position = $this->row->position - 1;
            $this->row->save();
            $this->dispatch('sectionRerender');
        }

        //If it's the first we either move it to the last position or move it to the last position of the section above
        elseif ($this->row->position == 0) {
            //If there's only 1 section we move the row to the last position
            if ($this->row->section->position == 0 && $this->row->section->estimate->sections()->count() == 1) {
                //                dd('cannot move up');
                $this->row->section->rows()->decrement('position');
                $this->row->position = $this->row->section->rows()->count() - 1;
                $this->row->save();
                $this->dispatch('sectionRerender');
            }

            // If the there's section above the current one we move the row to the last position of the section above
            elseif ($this->row->section->position > 0) {
                $this->row->section
                    ->rows()
                    ->where('id', '!=', $this->row->id)
                    ->decrement('position');
                $this->row->estimate_section_id = $this->row->section->estimate
                    ->sections()
                    ->where('position', $this->row->section->position - 1)
                    ->first()->id;
                $this->row->position = $this->row->section->estimate
                    ->sections()
                    ->where('position', $this->row->section->position - 1)
                    ->first()
                    ->rows()
                    ->count();
                $this->row->save();
                $this->dispatch('sectionRerender');
            }

            //If there's multiple sections and the current section is the first we move the row to the last position of the last section
            elseif ($this->row->section->position == 0 && $this->row->section->estimate->sections()->count() > 1) {
                $this->row->section->rows()->decrement('position');
                $this->row->estimate_section_id = $this->row->section->estimate
                    ->sections()
                    ->reorder('position', 'desc')
                    ->first()->id;
                $this->row->position = $this->row->section->estimate
                    ->sections()
                    ->reorder('position', 'desc')
                    ->first()
                    ->rows()
                    ->count();

                $this->row->save();
                $this->dispatch('sectionRerender');
            }
        }
    }

    public function rowDown(): void
    {
        //If it's not last we can increment its position and decrement the position of the row below it
        if ($this->row->position < $this->row->section->rows()->count() - 1) {
            $this->row->section
                ->rows()
                ->where('position', $this->row->position + 1)
                ->decrement('position');
            $this->row->position = $this->row->position + 1;
            $this->row->save();
            $this->dispatch('sectionRerender');
        }

        //If it's the last we either move it to the first position or move it to the first position of the section below
        elseif ($this->row->position == $this->row->section->rows()->count() - 1) {
            //If there's only 1 section we move the row to the first position
            if ($this->row->section->estimate->sections()->count() == 1) {
                //                dd('cannot move down');
                $this->row->section->rows()->increment('position');
                $this->row->position = 0;
                $this->row->save();
                $this->dispatch('sectionRerender');
            }

            // If the there's section below the current one we move the row to the first position of the section below
            elseif ($this->row->section->estimate->sections()->count() > 1 && $this->row->section->position < $this->row->section->estimate->sections()->count() - 1) {
                $this->row->section->estimate
                    ->sections()
                    ->where('position', $this->row->section->position + 1)
                    ->first()
                    ->rows()
                    ->increment('position');
                $this->row->estimate_section_id = $this->row->section->estimate
                    ->sections()
                    ->where('position', $this->row->section->position + 1)
                    ->first()->id;
                $this->row->position = 0;
                $this->row->save();
                $this->dispatch('sectionRerender');
            }

            // If it's the last row of the last section we move it to the first position of the first section
            elseif ($this->row->section->estimate->sections()->count() > 1 && $this->row->section->position == $this->row->section->estimate->sections()->count() - 1) {
                $this->row->section
                    ->where('position', '==', 0)
                    ->first()
                    ->rows()
                    ->increment('position');
                $this->row->estimate_section_id = $this->row->section->where('position', '==', 0)->first()->id;
                $this->row->position = 0;
                $this->row->save();
                $this->dispatch('sectionRerender');
            }
        }
    }

    public function rowDuplicate(): void
    {
        $this->row->section
            ->rows()
            ->where('position', '>', $this->row->position)
            ->increment('position');
        $newRow = $this->row->replicate();
        $newRow->position = $this->row->position + 1;
        $newRow->save();
        $this->dispatch('sectionRerender');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.pages.estimate.edit.row');
    }
}
