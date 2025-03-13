<?php

namespace Leasy\Leasy\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Autocomplete extends Component
{
	public $label;

    /**
     * Create a new component instance.
     */
    public function __construct($label = null)
    {
		$this->label = $label;
    }

	public function model(): string
	{
		foreach ($this->attributes as $key => $value) {
			if (str_contains($key, "wire:model")) {
				return "$key|$value";
			}
		}

		return "";
	}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.autocomplete');
    }
}
