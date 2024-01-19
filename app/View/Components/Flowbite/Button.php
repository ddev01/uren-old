<?php

namespace App\View\Components\Flowbite;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $elementType;
    public string $var;
    public string $commonClasses;
    public array $vars;

    public function __construct(public $href = false, string $var = 'base')
    {
        $this->commonClasses = 'flexc text-center text-white font-medium bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800';
        $this->vars = [
            'xs' => $this->commonClasses . ' px-3 py-2 gap-2 text-xs',
            'sm' => $this->commonClasses . ' px-3 py-2 gap-2 text-sm',
            'base' => $this->commonClasses . ' px-5 py-2.5 gap-3 text-sm',
            'lg' => $this->commonClasses . ' px-5 py-3 gap-3 text-base',
            'xl' => $this->commonClasses . ' px-6 py-3.5 gap-4 text-base',
        ];

        $this->elementType = $href ? 'a' : 'button';
        $this->var = isset($this->vars[$var]) ? $this->vars[$var] : $this->vars['base'];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
    // Pass the class string to the view
    return view('components.flowbite.button');
    }
}
