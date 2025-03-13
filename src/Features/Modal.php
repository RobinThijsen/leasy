<?php

namespace Leasy\Leasy\Features;

use Livewire\Component;

class Modal
{
    private string $name;
    private Component $component;

    public function __construct(string $name, Component $component)
    {
        $this->name = $name;
        $this->component = $component;
    }

    public function open(): void
    {
        $this->component->dispatch('modal.open', name: $this->name);
    }

    public function close(): void
    {
        $this->component->dispatch('modal.close', name: $this->name);
    }

    public function getName(): string
    {
        return $this->name;
    }
}
