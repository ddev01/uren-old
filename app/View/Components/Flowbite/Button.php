<?php

namespace App\View\Components\Flowbite;

use Illuminate\View\Component;

class Button extends Component
{
    public string $elementType;

    public string $base = 'flexc text-center font-medium rounded-lg focus:ring-4 focus:outline-none hover:scale-105 transition-all cursor-pointer hover:no-underline duration-150 transition-timing-function[button] appearance-none';

    public string $color;

    public string $size;

    public ?string $href = null;

    /**
     * @var string[]
     */
    public array $colors = [
        'blue' => 'text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800',
        'red' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800',
        'green' => 'text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
        'yellow' => 'text-white bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800',
        'indigo' => 'text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800',
        'purple' => 'text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800',
        'pink' => 'text-white bg-pink-700 hover:bg-pink-800 focus:ring-4 focus:ring-pink-300 dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800',
        'gray' => 'text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:ring-gray-300 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800',
        'white' => 'text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-900 dark:text-gray-100',
    ];

    /**
     * @var string[]
     */
    public array $sizes = [
        'xs' => 'px-3 py-2 gap-2 text-xs',
        'sm' => 'px-3 py-2 gap-2 text-sm',
        'base' => 'px-5 py-2.5 gap-3 text-sm',
        'lg' => 'px-5 py-3 gap-3 text-base',
        'xl' => 'px-6 py-3.5 gap-4 text-base',
    ];

    public function __construct(?string $href = null, string $size = 'base', string $color = 'blue')
    {
        $this->size = $this->sizes[$size] ?? $this->sizes['base'];
        $this->color = $this->colors[$color] ?? $this->colors['blue'];

        $this->elementType = $href ? 'a' : 'button';
        $this->href = $href;
    }

    public function render(): \Illuminate\View\View
    {
        return view('components.flowbite.button');
    }
}
