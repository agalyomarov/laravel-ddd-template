<?php

declare(strict_types=1);

namespace App\Domain\Shared\Enums;

enum RoleEnum: string
{
    case OPERATOR = 'operator';
    case MANAGER = 'manager';
    case CREDIT_DEPARTMENT = 'credit_department';

    public static function fromValue(string $value): self
    {
        return self::tryFrom($value)
            ?? throw new \InvalidArgumentException("Недопустимое значение статуса: {$value}");
    }
}
