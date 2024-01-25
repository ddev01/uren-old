<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Svg extends Component
{
	public $icon;
	public $class;
	public function __construct($icon, $class = '')
	{
		$this->icon = $icon;
		$this->class = $class;
	}
	public function render()
	{
		$path = public_path('svgs/' . $this->icon . '.svg');
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
