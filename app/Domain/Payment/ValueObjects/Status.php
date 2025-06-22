<?php

namespace App\Domain\Payment\ValueObjects;


abstract class Status
{
    protected $next = [];

    public function getStatus(): string
    {
        return get_class($this);
    }

    public function canBeChangedTo(self $status): bool
    {
        $className = get_class($status);
        return in_array($className, $this->next, true);
    }

    public function allowsModification(): bool
    {
        return true;
    }

    public function ensureCanBeChangedTo(self $status): void
    {
        if (!$this->canBeChangedTo($status)) {
            throw new \Exception('Status cannot be changed');
        }
    }

    public function ensureAllowsModification(): void
    {
        if (!$this->allowsModification()) {
            throw new \Exception('Status cannot be changed');
        }
    }
}
