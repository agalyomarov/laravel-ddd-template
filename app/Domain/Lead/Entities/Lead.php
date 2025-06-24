<?php

declare(strict_types=1);

namespace App\Domain\Lead\Entities;

use App\Domain\Lead\ValueObjects\Lead\Id;
use App\Domain\Lead\ValueObjects\Lead\Name;
use App\Domain\Lead\ValueObjects\Lead\Phone;
use App\Domain\Lead\ValueObjects\Lead\Status;

final class Lead
{
    private Id $id;
    private Name $name;
    private Phone $phone;
    private Status $status;
    private ?string $comment;

    public function __construct(Id $id, Name $name, Phone $phone, Status $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->status = $status;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setName(Name $name): void
    {
        $this->name = $name;
    }

    public function setPhone(Phone $phone): void
    {
        $this->phone = $phone;
    }

    public function setComment(?string $comment): void
    {
        $this->comment = $comment;
    }

    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }
}
