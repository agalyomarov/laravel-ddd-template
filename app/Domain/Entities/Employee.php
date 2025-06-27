<?php

declare(strict_types=1);

namespace App\Domain\Employee\Entities;

use App\Domain\Shared\Enums\RoleEnum;
use InvalidArgumentException;
use LogicException;

final class Employee
{
    private ?int $id;
    private string $name;
    private RoleEnum $role;

    public function __construct(
        string $name,
        RoleEnum $role,
    ) {
        $this->name = $this->validateName($name);
        $this->role = $role;
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
    public function getRole(): string
    {
        return $this->role->value;
    }
    public function getRoleEnum(): RoleEnum
    {
        return $this->role;
    }
}
