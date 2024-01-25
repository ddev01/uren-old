<?php

namespace App\View\Components\Flowbite\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
	public function __construct(public $name, public $label = false, public $icon = false, public $helper = false, public $prefix = false, public $prefixFade = false, public $suffix = false, public $suffixFade = false, public $clear = false)
	{
	}

	public function render(): View|Closure|string
	{
		return view('components.flowbite.inputs.input');
	}
}
