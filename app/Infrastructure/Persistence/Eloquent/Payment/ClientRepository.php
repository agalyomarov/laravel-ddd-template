<?php

namespace App\Infrastructure\Persistence\Eloquent\Payment;

use App\Domain\Payment\Aggregate\Client;
use App\Domain\Payment\Contracts\Repository\ClientRepositoryInterface;
use App\Domain\Payment\ValueObjects\Address;
use App\Domain\Payment\ValueObjects\Name;
use App\Domain\Payment\ValueObjects\Phone;

class ClientRepository implements ClientRepositoryInterface
{
    public function findById(int $id): Client
    {
        try {
            return new Client(
                $id,
                new Name("Фамилия", "Имя", "Отчество", "Псевдоним"),
                new Address("Украина", "Киев", "01001", ["ул. Кодеров, д. 0xFF"]),
                new Phone('380', "44", "1234567")
            );
        } catch (\Throwable $e) {
            throw $e; // пробрасываем дальше
        }
    }
    public function create() {}
    public function update(Client $client) {}
    public function changeAddress($id, Address $address) {}
}
