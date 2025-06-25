<?php

declare(strict_types=1);

namespace App\Domain\Lead\Entities;

use App\Domain\Lead\Enums\LeadStatusEnum;
use InvalidArgumentException;
use LogicException;

final class Lead
{
    private ?int $id;
    private string $name;
    private string $phone;
    private LeadStatusEnum $status;
    private ?string $comment;

    public function __construct(string $name, string $phone, LeadStatusEnum $status, ?string $comment)
    {
        $this->name = $this->validateName($name);
        $this->phone = $this->validatePhone($phone);
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
    private function validatePhone(string $data): string
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
        if (!$this->status->canTransitionTo($newStatus)) {
            throw new LogicException(
                sprintf(
                    'Нельзя изменить статус лида с "%s" на "%s".',
                    $this->status->value,
                    $newStatus->value
                )
            );
        }

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
    public function getPhone(): string
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
