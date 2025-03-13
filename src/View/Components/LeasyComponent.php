<?php

namespace Leasy\Leasy\View\Components;

use Illuminate\View\Component;

class LeasyComponent extends Component
{
    public string $id;
    public bool $required;

    public function __construct(string $id, bool $required)
    {
        $this->id = $id;
        $this->required = $required;
    }

    /**
     * @inheritDoc
     */
    public function render() {}
}
