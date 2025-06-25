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

    /** @return LeadStatusEnum[] */
    public function allowedTransitions(): array
    {
        return match ($this) {
            self::NEW => [self::PROCESSING],
            self::PROCESSING => [self::CLOSED],
            self::CLOSED => [],
        };
    }

    public function canTransitionTo(self $newStatus): bool
    {
        return in_array($newStatus, $this->allowedTransitions(), true);
    }
}
