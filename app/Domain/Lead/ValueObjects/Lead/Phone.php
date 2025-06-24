<?php

namespace App\Domain\Lead\ValueObjects\Lead;

use \InvalidArgumentException;

final class Phone
{
    public readonly string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if ($value === '') {
            throw new InvalidArgumentException('Телефон не может быть пустым.');
        }

        if (startsWith($value, '+')) {
            throw new InvalidArgumentException('Телефон не может начинаться с +.');
        }

        if (mb_strlen($value) != 11) {
            throw new InvalidArgumentException('Телефон должен состоять из 11 цифр.');
        }

        $this->value = $value;
    }
}
