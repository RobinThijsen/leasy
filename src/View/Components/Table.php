<?php

namespace Leasy\Leasy\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
	public $class;
    /**
     * Create a new component instance.
     */
    public function __construct($class)
    {
		$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table');
    }
}
