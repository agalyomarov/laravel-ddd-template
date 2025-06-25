<?php

namespace App\Domain\Lead\Enums;

use LogicException;

enum LeadStatusEnum: string
{
    case NEW = 'new';
    case PROCESSING = 'processing';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
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
            self::PROCESSING => [self::CLOSED, self::APPROVED, self::REJECTED],
            self::APPROVED => [self::CLOSED],
            self::REJECTED => [self::CLOSED],
            self::CLOSED => [],
        };
    }

    public function canTransitionTo(self $newStatus): bool
    {
        return in_array($newStatus, $this->allowedTransitions(), true);
    }

    public function ensureCanBeChangedTo(self $newStatus): void
    {
        if (!$this->canTransitionTo($newStatus)) {
            throw new LogicException(
                sprintf(
                    'Нельзя изменить статус лида с "%s" на "%s".',
                    $this->status->value,
                    $newStatus->value
                )
            );
        }
    }
}
