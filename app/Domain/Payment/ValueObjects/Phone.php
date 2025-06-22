<?php

namespace App\Domain\Payment\ValueObjects;

class Phone
{
    private string $country_code;
    private string $city_code;
    private string $number;

    public function __construct($country_code, $city_code, $number)
    {
        //Validation. Valid properties or Exception
        $this->country_code = $this->validateCountryCode($country_code);
        $this->city_code = $city_code;
        $this->number = $number;
    }

    private function validateCountryCode($data)
    {
        //Validation. Valid data or Exception
        return $data;
    }

    //TODO create getters.no setters
}
