<?php

namespace App\View\Components\Input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Number extends Component
{
    public string $name;

    public ?string $label;

    public function __construct(string $name, ?string $label = null)
    {
        $this->name = $name;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.input.number');
    }
}
