<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use InvalidArgumentException;

class Phone
{
    private string $value;

    public function __construct(
        string $value
    ) {
        $this->value = $this->validate($value);
    }

    private function validate($data)
    {
        $data = trim($data);
        if ($data === '') {
            throw new InvalidArgumentException('Телефон не может быть пустым.');
        }

        if (startsWith($data, '+')) {
            throw new InvalidArgumentException('Телефон не может начинаться с +.');
        }

        if (mb_strlen($data) != 11) {
            throw new InvalidArgumentException('Телефон должен состоять из 11 цифр.');
        }

        return $data;
    }

    public function get(): string
    {
        return $this->value;
    }
}
