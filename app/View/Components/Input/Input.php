<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Input extends Component
{
	public $name;
	public $label;

	public function __construct($name, $label = false)
	{
		$this->name = $name;
		$this->label = $label;
	}

	public function render()
	{
		return view('components.input.input');
	}
}
