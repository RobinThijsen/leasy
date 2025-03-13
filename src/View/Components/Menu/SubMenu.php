<?php

namespace Leasy\Leasy\View\Components\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubMenu extends Component
{
	public $heading;

    /**
     * Create a new component instance.
     */
    public function __construct($heading)
    {
		$this->heading = $heading;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.sub-menu');
    }
}
