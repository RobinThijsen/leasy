<?php

namespace Leasy\Leasy\View\Components\Menu;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
	public $model;
	public $value;

    /**
     * Create a new component instance.
     */
    public function __construct($model, $value)
    {
		$this->model = $model;
	    $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu.checkbox');
    }
}
