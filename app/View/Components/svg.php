<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Svg extends Component
{
    public $svg;
    public $class;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($svg, $class = '')
    {
        $this->svg = $svg;
        $this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $path = public_path('svgs/' . $this->svg . '.svg');

        if (file_exists($path)) {
            $svgContent = file_get_contents($path);

            // Only inject the class attribute into the SVG content if $class is not empty
            if (!empty($this->class)) {
                $svgContent = preg_replace('/<svg /', '<svg class="' . $this->class . '" ', $svgContent, 1);
            }

            return $svgContent;
        }

        return ''; // Return empty string if file doesn't exist
    }
}
