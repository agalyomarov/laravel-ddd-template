<?php

namespace App\Domain\Payment\Contracts\Service;

use App\Domain\Payment\ValueObjects\Address;

interface ClientServiceInterface
{
    public function changeAddress(int $id, Address $address);
}
