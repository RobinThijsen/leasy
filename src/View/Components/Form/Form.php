<?php

namespace Leasy\Leasy\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Leasy\Leasy\View\Components\LeasyComponent as Component;

class Form extends Component
{
    public bool $livewire;
    public string $livewireAction;
    public string $method;
    public $route;
    public string|bool $className;
    public bool $displayErrors;
    public bool $withButtons;

    /**
     * Create a new component instance.
     */
    public function __construct($livewire = false, $livewireAction = "update", $method = "post", $route = null, $className = "form", $displayErrors = false, $withButtons = false)
    {
        $this->livewire = $livewire;
        $this->livewireAction = $livewireAction;
        $this->method = $method;
        $this->route = $route;
        $this->className = $className;
        $this->displayErrors = $displayErrors;
        $this->withButtons = $withButtons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form');
    }
}
