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

    public function __construct(string $name, string $phone, LeadStatusEnum $status)
    {
        $this->name = $this->validateName($name);
        $this->phone = $this->validatePhone($phone);
        $this->status = $status;
    }
    private function validateName($data): string
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
    private function validatePhone($data): string
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
    public function getId(): int
    {
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
    public function getComment(): ?string
    {
        return $this->comment;
    }
    public function setId(int $data): void
    {
        if ($data < 0) {
            throw new InvalidArgumentException('ID не может быть отрицательным.');
        }

        if ($this->id !== null) {
            throw new LogicException('ID уже установлен.');
        }

        $this->id = $data;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }
    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }
    public function setStatus(LeadStatusEnum $status): void
    {
        $this->status = $status;
    }
}
