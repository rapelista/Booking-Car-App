<?php

namespace App\View\Components\input;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class fuel extends Component
{
    public $index, $fuelTypes;
    /**
     * Create a new component instance.
     */
    public function __construct($index, $fuelTypes)
    {
        $this->index = $index;
        $this->fuelTypes = $fuelTypes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input.fuel');
    }
}
