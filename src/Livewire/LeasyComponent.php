<?php

namespace Leasy\Leasy\Livewire;

use Leasy\Leasy\Exceptions\NoModalException;
use Leasy\Leasy\Exceptions\NoToastrComponentException;
use Livewire\Attributes\On;
use Livewire\Component;

class LeasyComponent extends Component
{
    const MODAL_EXCEPTION = 'NoModalException';

    #[On('js-exception')]
    public function jsException($type, $name = null)
    {
        switch ($type) {
            case self::MODAL_EXCEPTION:
                throw new NoModalException($name);
            default:
                break;
        }
    }
}
