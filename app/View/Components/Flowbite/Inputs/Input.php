<?php

namespace App\View\Components\Flowbite\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public function __construct(public string $name, public ?string $label = null, public ?string $icon = null, public ?string $helper = null, public ?string $prefix = null, public bool $prefixFade = false, public ?string $suffix = null, public bool $suffixFade = false, public bool $clear = false, public string $width = 'w-full')
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.flowbite.inputs.input');
    }
}
