<?php

namespace App\Application\DTOs\Payment;

use App\Domain\Payment\ValueObjects\Address;

class AddressMapper
{

    public static function fromDto(AddressDto $dto): Address
    {
        return new Address($dto->country, $dto->city, $dto->zip, $dto->lines);
    }
}
