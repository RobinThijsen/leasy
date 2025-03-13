<?php

namespace Leasy\Leasy\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Heading extends Component
{
	public $field;
	public $direction;
	public $class;
	public $sortable;
    /**
     * Create a new component instance.
     */
    public function __construct($field = null, $direction = null, $class = '', $sortable = false)
    {
		$this->field = $field;
		$this->direction = $direction;
		$this->sortable = $sortable;
		$this->class = $class;

		if ($sortable) $this->class .= " sortable";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.heading');
    }
}
