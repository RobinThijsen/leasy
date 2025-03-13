<?php

namespace Leasy\Leasy;

use Leasy\Leasy\Enums\ToastrPosition;
use Leasy\Leasy\Enums\ToastrType;
use Leasy\Leasy\Features\Modal;
use Leasy\Leasy\Livewire\ToastrHandler;
use Livewire\Component;

class Leasy
{
    private ?Component $component;

    public function __construct()
    {
        $this->component = $this->getLastLivewireComponent();
    }

    /**
     * Instantiate a livewire modal event
     *
     * @param string $name name of the modal targeted
     * @return Modal
     */
    public function modal(string $name): Modal
    {
        return new Modal($name, $this->component);
    }

    /**
     * Create and call a livewire toastr event
     *
     * @param $content
     * @param $header
     * @param ToastrType $type
     * @param ToastrPosition $position
     * @param bool $closable
     * @return void
     */
    public function toast($content, $header = null, ToastrType $type = ToastrType::DEFAULT, ToastrPosition $position = ToastrPosition::TOP_RIGHT, bool $closable = false): void
    {
        $this->component
            ->dispatch('toastr',
                content: $content,
                header: $header,
                type: ToastrType::toString($type),
                position: ToastrPosition::toString($position),
                closable: $closable,
            )->to(ToastrHandler::class);
    }

    /**
     * Return latest livewire component in the trace
     *
     * @return Component|null
     */
    private function getLastLivewireComponent(): Component|null
    {
        $traces = debug_backtrace();
        foreach ($traces as $trace) {
            if (isset($trace['class']) && isset($trace['object']) && str_starts_with($trace['class'], 'App\Livewire')) {
                return $trace['object'];
            }
        }

        return null;
    }
}
