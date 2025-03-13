<?php

namespace Leasy\Leasy\Exceptions;

class NoModalException extends \Exception
{
    public function __construct(string $name)
    {
        parent::__construct("No modal [$name] found", 500);
    }
}
