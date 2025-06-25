<?php

declare(strict_types=1);

namespace App\Domain\Lead\ValueObjects\Lead;

use App\Domain\Lead\Enums\LeadStatus;

final class Status
{
    private string $value;

    private function __construct(string $value)
    {
        if (!in_array($value, LeadStatus::cases(), true)) {
            throw new \InvalidArgumentException("Недопустимое значение статуса: {$value}");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function equals(self $other): bool
    {
        return $this->getValue() === $other->getValue();
    }
}
