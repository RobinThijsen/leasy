<?php

namespace Leasy\Leasy\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Leasy\Leasy\View\Components\LeasyComponent as Component;

class Input extends Component
{
	public string $type;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id, bool $required = false, string $type = "text")
    {
		parent::__construct($id, $required);
		$this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input');
    }
}
