<?php

namespace App\Domain\Lead\ValueObjects\Lead;

use \InvalidArgumentException;

final class Name
{
    public readonly string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new InvalidArgumentException('Имя не может быть пустым.');
        }

        if (mb_strlen($value) > 100) {
            throw new InvalidArgumentException('Имя слишком длинное.');
        }

        $this->value = $value;
    }
}
