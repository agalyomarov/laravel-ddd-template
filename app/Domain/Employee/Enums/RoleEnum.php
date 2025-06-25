<?php

declare(strict_types=1);

namespace App\Domain\Employee\Enums;

enum RoleEnum: string
{
    case OPERATOR = 'operator';
    case MANAGER = 'manager';
    case CREDIT = 'credit';

    public static function fromValue(string $value): self
    {
        return self::tryFrom($value)
            ?? throw new \InvalidArgumentException("Недопустимое значение статуса: {$value}");
    }
}
