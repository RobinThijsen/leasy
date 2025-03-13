<?php

namespace Leasy\Leasy\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Dropdown extends Component
{
	public $class;
	public $position;
	public $button;
	public $menu;

    /**
     * Create a new component instance.
     */
    public function __construct($class = "", $position = 'bottom')
    {
		$this->class = $class;
		$this->position = $position;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown');
    }
}
