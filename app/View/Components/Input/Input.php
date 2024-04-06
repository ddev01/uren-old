<?php

namespace App\View\Components\Input;

use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(public string $name, public ?string $label = null)
    {
    }

    public function render()
    {
        return view('components.input.input');
    }
}
