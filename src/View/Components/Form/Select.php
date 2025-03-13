<?php

namespace Leasy\Leasy\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Leasy\Leasy\View\Components\LeasyComponent as Component;

class Select extends Component
{
	public string $class;

    public function __construct(string $id, bool $required = false, string $class = "")
    {
		parent::__construct($id, $required);
		$this->class = "form-control $class";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.select');
    }
}
