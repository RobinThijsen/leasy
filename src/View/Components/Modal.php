<?php

namespace Leasy\Leasy\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
	public string $name;
	public ?string $variant;
	public string|bool $title;
	public string $class;

    /**
     * Create a new component instance.
     */
    public function __construct($name, $variant = null, $title = false, $class = "")
    {
		$this->name = $name;
		$this->variant = $variant;
		$this->title = $title;
		$this->class = $class;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal.modal');
    }
}
