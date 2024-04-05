<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Input extends Component
{
    public string $name;

    public ?string $label;

    public function __construct(string $name, ?string $label = null)
    {
        $this->name = $name;
        $this->label = $label;
    }

    public function render()
    {
        return view('components.input.input');
    }
}
