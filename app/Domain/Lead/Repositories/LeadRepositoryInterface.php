<?php

namespace App\Domain\Lead\Repositories;

interface ClientRepositoryInterface
{
    public function findById(int $id): Client;
    public function create();
    public function update(Client $client);
}
