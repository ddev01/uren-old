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
    public $prefix;
    public $prefixFade;
    public $suffix;
    public $suffixFade;

    public function __construct($name, $label = false, $icon = false, $helper = false,$prefix = false, $prefixFade = false, $suffix = false, $suffixFade = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->icon = $icon;
        $this->helper = $helper;
        $this->prefix = $prefix;
        $this->prefixFade = $prefixFade;
        $this->suffix = $suffix;
        $this->suffixFade = $suffixFade;
    }

    public function render(): View|Closure|string
    {
        return view('components.flowbite.inputs.input');
    }
}
