<?php

namespace App\Domain\Payment\Contracts\Repository;

use App\Domain\Payment\Aggregate\Client;
use App\Domain\Payment\ValueObjects\Address;

interface ClientRepositoryInterface
{
    public function findById(int $id): Client;
    public function create();
    public function update(Client $client);
}
