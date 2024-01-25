<?php

namespace App\Livewire\Pages\Estimate\Edit;

use Livewire\Component;

class Table extends Component
{
	public $estimate;

	public function updatedExecuted()
	{
		$this->estimate->executed = $this->executed;
		$this->estimate->save();
	}

	protected $listeners = [
		'tableRerender' => 'render',
	];

	public function render()
	{
		return view('livewire.pages.estimate.edit.table');
	}
}
