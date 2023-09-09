<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class datatables extends Component
{
    public $bookings, $id;
    /**
     * Create a new component instance.
     */
    public function __construct($bookings, $id)
    {
        $this->bookings = $bookings;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.datatables');
    }
}
