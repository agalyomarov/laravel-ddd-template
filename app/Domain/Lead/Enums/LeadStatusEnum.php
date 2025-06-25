<?php

namespace App\Domain\Lead\Enums;

enum LeadStatusEnum: string
{
    case NEW = 'new';
    case PROCESSING = 'processing';
    case CLOSED = 'closed';

    public static function fromValue(string $value): self
    {
        return self::tryFrom($value)
            ?? throw new \InvalidArgumentException("Недопустимое значение статуса: {$value}");
    }
}
