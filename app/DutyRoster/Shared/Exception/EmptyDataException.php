<?php

namespace App\DutyRoster\Shared\Exception;

use Exception;
use JetBrains\PhpStorm\Pure;
use Throwable;

class EmptyDataException extends Exception
{
    #[Pure]
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct('Empty content or wrong format.', $code, $previous);
    }
}
