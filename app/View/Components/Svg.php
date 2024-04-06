<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Svg extends Component
{
    public function __construct(public string $icon, public string $class = '')
    {
    }

    public function render()
    {
        $path = public_path('svgs/' . $this->icon . '.svg');
        if (file_exists($path)) {
            $svgContent = file_get_contents($path);
            // Only inject the class attribute into the SVG content if $class is not empty
            if ($this->class !== '' && $this->class !== '0') {
                $svgContent = preg_replace('/<svg /', '<svg class="' . $this->class . '" ', $svgContent, 1);
            }

            return view('components.svg', ['svgContent' => $svgContent]);
        }

        return view('components.svg', ['svgContent' => '<div class="text-red-500">SVG not found</div>']);
    }
}
