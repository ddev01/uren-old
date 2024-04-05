<?php

namespace App\View\Components\Flowbite\Inputs;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    public string $name;
    public ?string $label = null;
    public ?string $icon = null;
    public ?string $helper = null;
    public ?string $prefix = null;
    public bool $prefixFade = false;
    public ?string $suffix = null;
    public bool $suffixFade = false;
    public bool $clear = false;
    public string $width = 'w-full';

    public function __construct(string $name, ?string $label = null, ?string $icon = null, ?string $helper = null, ?string $prefix = null, bool $prefixFade = false, ?string $suffix = null, bool $suffixFade = false, bool $clear = false, string $width = 'w-full')
    {
        $this->name = $name;
        $this->label = $label;
        $this->icon = $icon;
        $this->helper = $helper;
        $this->prefix = $prefix;
        $this->prefixFade = $prefixFade;
        $this->suffix = $suffix;
        $this->suffixFade = $suffixFade;
        $this->clear = $clear;
        $this->width = $width;
    }

    public function render(): View|Closure|string
    {
        return view('components.flowbite.inputs.input');
    }
}
