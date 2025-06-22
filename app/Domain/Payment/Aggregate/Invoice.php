<?php

namespace App\Domain\Payment\Aggregate;

use App\Domain\Payment\ValueObjects\LineItem;
use App\Domain\Payment\ValueObjects\Status;

class Invoice
{
    private int $id;
    private Client $client;
    private array $lineItems;
    private Status $status;

    public function __construct(int $id, Client $client)
    {
        //Validation. Valid properties or Exception
        $this->id = $id;
        $this->client = $client;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    /** @var LineItem[] */
    public function getLineItems(): array
    {
        return $this->lineItems;
    }

    public function getStatus(): string
    {
        return $this->status->getStatus();
    }

    public function setLineItems(array $lineItems): void
    {
        $this->lineItems = $lineItems;
    }
    public function setStatus(Status $status): void
    {
        $this->status = $status;
    }

    public function changeStatus(Status $status): void
    {
        $this->status->ensureCanBeChangedTo($status);
        $this->status = $status;
    }

    public function addLineItem(LineItem $lineItem): void
    {
        $this->status->ensureAllowsModification();
        $this->lineItems[] = $lineItem;
    }

    public function removeLineItem(LineItem $lineItem): void
    {
        $this->status->ensureAllowsModification();
        $key = array_search($lineItem, $this->lineItems);
        if ($key === false) {
            throw new \Exception('Line item not found');
        }
        unset($this->lineItems[$key]);
    }
}
