<?php

namespace Leasy\Leasy\View\Components\Autocomplete;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Item extends Component
{
	public mixed $key;
	public string $class;

    /**
     * Create a new component instance.
     */
    public function __construct(mixed $key, string $class = "")
    {
		$this->key = $key;
		$this->class = "autocomplete__resultsContainer__item $class";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.autocomplete.item');
    }
}
