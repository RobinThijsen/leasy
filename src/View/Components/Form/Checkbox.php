<?php

namespace Leasy\Leasy\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Leasy\Leasy\View\Components\LeasyComponent as Component;

class Checkbox extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(string $id, bool $required = false)
    {
		parent::__construct($id, $required);
    }

	public function isSwitch(): bool
	{
		return $this->attributes->has('role') && $this->attributes->get('role') == "switch";
	}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.checkbox');
    }
}
