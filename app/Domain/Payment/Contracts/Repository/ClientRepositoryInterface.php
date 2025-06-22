<?php

namespace App\Domain\Payment\Contracts\Repository;

use App\Domain\Payment\Aggregate\Client;

interface ClientRepositoryInterface
{
    public function findById(int $id): Client;
    public function create();
    public function update();
}
