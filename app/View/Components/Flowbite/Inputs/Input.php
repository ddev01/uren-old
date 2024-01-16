<?php

namespace App\View\Components\Flowbite\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public $name;

    public $label;

    public $icon;

    public $helper;
    

    public function __construct($name, $label = false, $icon = false, $helper = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->icon = $icon;
        $this->helper = $helper;
    }

    public function render(): View|Closure|string
    {
        return view('components.flowbite.inputs.input');
    }
}
