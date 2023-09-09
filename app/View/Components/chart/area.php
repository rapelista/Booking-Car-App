<?php

namespace App\View\Components\chart;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class area extends Component
{
    public $id, $labels, $values, $title;
    /**
     * Create a new component instance.
     */
    public function __construct($id, $labels, $values, $title)
    {
        $this->id = $id;
        $this->labels = $labels;
        $this->values = $values;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.chart.area');
    }
}
