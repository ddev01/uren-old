<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
	public $name;

	public $label;

	public function __construct($name, $label = false)
	{
		$this->name = $name;
		$this->label = $label;
	}

	public function render(): View|Closure|string
	{
		return view('components.input.select');
	}
}
