<?php

namespace App\Domain\Payment\Aggregate;

use App\Domain\Payment\ValueObjects\Address;
use App\Domain\Payment\ValueObjects\Phone;
use App\Domain\Payment\ValueObjects\Name;

class Client
{
    private int $id;
    private Name  $name;
    private Address  $adress;
    private Phone $phone;

    public function __construct(int $id, Name  $name, Address $adress, Phone $phone)
    {
        //Validation. Valid properties or Exception
        $this->id = $id;
        $this->name = $name;
        $this->adress = $adress;
        $this->phone = $phone;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): Name
    {
        return $this->name;
    }

    public function getAdress(): Address
    {
        return $this->adress;
    }

    public function getPhone(): Phone
    {
        return $this->phone;
    }
}
