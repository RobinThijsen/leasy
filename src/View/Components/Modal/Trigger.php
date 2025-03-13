<?php

namespace Leasy\Leasy\View\Components\Modal;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Trigger extends Component
{
	public string $name;
	public string $title;
	public string $class;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $title = null, $class = "button")
    {
		if (empty($title))
			$title = __('punchstation.buttons.modal.open.title');
		$this->name = $name;
		$this->title = $title;
		$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.trigger');
    }
}
