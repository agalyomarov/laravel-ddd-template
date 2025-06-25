<?php

declare(strict_types=1);

namespace App\Domain\Lead\Entities;

use App\Domain\Lead\Enums\LeadStatusEnum;
use App\Domain\Lead\ValueObjects\Lead\Phone;
use InvalidArgumentException;
use LogicException;

final class Lead
{
    private ?int $id;
    private string $name;
    private Phone $phone;
    private LeadStatusEnum $status;
    private ?string $comment;

    public function __construct(
        string $name,
        Phone $phone,
        LeadStatusEnum $status,
        ?string $comment
    ) {
        $this->name = $this->validateName($name);
        $this->phone = $phone;
        $this->comment = $this->validateComment($comment);
        $this->status = $status;
    }
    private function validateName(string $data): string
    {
        $data = trim($data);

        if ($data === '') {
            throw new InvalidArgumentException('Имя не может быть пустым.');
        }

        if (mb_strlen($data) > 100) {
            throw new InvalidArgumentException('Имя слишком длинное.');
        }

        return $data;
    }
    private function validateComment(?string $data): ?string
    {
        if ($data !== null && mb_strlen($data) > 1000) {
            throw new InvalidArgumentException('Комментарий слишком длинный');
        }
        return $data;
    }
    public function setId(int $data): void
    {
        if ($data < 1) {
            throw new InvalidArgumentException('ID не может быть отрицательным.');
        }

        if ($this->id !== null) {
            throw new LogicException('ID уже установлен.');
        }

        $this->id = $data;
    }
    public function setStatus(LeadStatusEnum $newStatus): void
    {
        $this->status->ensureCanBeChangedTo($newStatus);
        $this->status = $newStatus;
    }
    public function getId(): int
    {
        if ($this->id === null) {
            throw new LogicException('ID ещё не установлен.');
        }

        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPhone(): Phone
    {
        return $this->phone;
    }
    public function getStatus(): string
    {
        return $this->status->value;
    }
    public function getStatusEnum(): LeadStatusEnum
    {
        return $this->status;
    }
    public function getComment(): string
    {
        return $this->comment ?? "";
    }
}
