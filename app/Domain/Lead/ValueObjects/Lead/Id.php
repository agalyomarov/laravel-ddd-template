<?php

namespace App\Domain\Lead\ValueObjects\Lead;

use \InvalidArgumentException;

final class Id
{
    public readonly int $value;

    public function __construct(int $value)
    {
        if ($value < 0) {
            throw new InvalidArgumentException('ID не может быть отрицательным.');
        }

        $this->value = $value;
    }
}
