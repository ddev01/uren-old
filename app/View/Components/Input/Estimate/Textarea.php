<?php

namespace App\View\Components\Input\Estimate;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Textarea extends Component
{
	public $name;

	public $label;

	public function __construct($name, $label = false)
	{
		$this->name = $name;
		$this->label = $label;
	}

	/**
	 * Get the view / contents that represent the component.
	 */
	public function render(): View|Closure|string
	{
		return view('components.input.estimate.textarea');
	}
}
