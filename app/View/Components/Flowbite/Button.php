<?php

namespace App\View\Components\Flowbite;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $elementType;
    public $var;

    public $vars = [
        'default' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flexc gap-4',
        'small' => 'py-1 px-1',
    ];

    public function __construct(public $href = false, $var = 'default')
    {
        $this->elementType = $href ? 'a' : 'button';
        $this->var = isset($this->vars[$var]) ? $this->vars[$var] : $this->vars['default'];
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
