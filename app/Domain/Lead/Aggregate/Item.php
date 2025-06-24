<?php

namespace App\Domain\Payment\Aggregate;


use App\Domain\Payment\ValueObjects\Money;


class Item
{
    private int $id;
    private string $name;
    private string $decription;
    private Money $price;

    public function __construct(int $id, string $name, Money $price)
    {
        //Validation. Valid properties or Exception
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): Money
    {
        return $this->price;
    }

    public function getDecription(): string
    {
        return $this->decription;
    }

    public function setDecription(string $decription): void
    {
        $this->decription = $decription;
    }
}
