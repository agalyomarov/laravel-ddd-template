<?php

namespace App\Domain\Lead\ValueObjects\Lead;

use \InvalidArgumentException;

final class Comment
{
    public readonly string $value;

    public function __construct(string $value)
    {
        $value = trim($value);

        if (mb_strlen($value) > 150) {
            throw new InvalidArgumentException('Комментарий слишком длинный.');
        }

        $this->value = $value;
    }
}
