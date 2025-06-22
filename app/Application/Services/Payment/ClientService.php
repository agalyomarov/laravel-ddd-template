<?php

namespace App\Application\Services\Payment;


use App\Domain\Payment\Contracts\Repository\ClientRepositoryInterface;
use App\Domain\Payment\Contracts\Service\ClientServiceInterface;
use App\Domain\Payment\ValueObjects\Address;

class ClientService implements ClientServiceInterface
{
    public function __construct(
        private ClientRepositoryInterface $clientRepository,
    ) {}


    public function changeAddress(int $id, Address $address)
    {
        $client = $this->clientRepository->findById($id);
        $this->clientRepository->changeAddress($client->getId(), $address);
        $this->clientRepository->update($client);
    }
}
