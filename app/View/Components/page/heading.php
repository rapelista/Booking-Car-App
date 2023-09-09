<?php

namespace App\View\Components\page;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class heading extends Component
{
    public $page_heading;

    /**
     * Create a new component instance.
     */
    public function __construct($pageHeading)
    {
        $this->page_heading = $pageHeading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.page.heading');
    }
}
