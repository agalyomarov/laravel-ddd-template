<?php

namespace App\Domain\Payment\ValueObjects;

use App\Domain\Payment\Aggregate\Item;

class LineItem
{
    private Item  $item;
    private  int|float $quantity;

    public function __construct(Item $item, int|float $quantity = 1)
    {
        //Validation. Valid properties or Exception
        $this->quantity = $this->validateQuantity($quantity);
        $this->item = $item;
    }

    private function validateQuantity($data)
    {
        //Validation. Valid data or Exception
        return $data;
    }
    //TODO create getters.no setters

    public function getItem(): Item
    {
        return $this->item;
    }

    public function getQuantity(): int|float
    {
        return $this->quantity;
    }
}
