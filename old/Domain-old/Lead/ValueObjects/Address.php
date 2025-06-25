<?php

namespace App\Domain\Payment\ValueObjects;

class Address
{
    private string $country;
    private string $city;
    private string $zip;
    /** @var string[] */
    private array $lines;

    public function __construct($country, $city, $zip, $lines)
    {
        //Validation. Valid properties or Exception
        $this->country = $this->validateCountry($country);
        $this->city = $city;
        $this->zip = $zip;
        $this->lines = $lines;
    }

    private function validateCountry($country)
    {
        //Validation. Valid data or Exception
        return $country;
    }

    //TODO create getters.no setters
}
