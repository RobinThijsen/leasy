<?php

namespace Leasy\Leasy\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class EmptyRow extends Component
{
	public $length;
    /**
     * Create a new component instance.
     */
    public function __construct($length)
    {
		$this->length = $length;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.empty-row');
    }
}
