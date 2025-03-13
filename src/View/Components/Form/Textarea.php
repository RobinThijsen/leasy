<?php

namespace Leasy\Leasy\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Leasy\Leasy\View\Components\LeasyComponent as Component;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(string $id, bool $required = false)
    {
		parent::__construct($id, $required);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.textarea');
    }
}
