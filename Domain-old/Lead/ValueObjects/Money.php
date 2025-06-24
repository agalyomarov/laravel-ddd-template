<?php

namespace App\Domain\Payment\ValueObjects;

class Money
{
    private string $currency;
    private string $amount;

    public function __construct($currency, $amount)
    {
        //Validation. Valid properties or Exception
        $this->currency = $this->validateAmount($amount);
        $this->amount = $amount;
    }

    private function validateAmount($data)
    {
        //Validation. Valid data or Exception
        return $data;
    }

    static function USD(int|float $amount)
    {
        return new Money('USD', $amount);
    }

    //TODO create getters.no setters
}
