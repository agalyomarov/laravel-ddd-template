<?php

namespace App\Application\DTOs\Payment;

class AddressDto
{
    public string $country;
    public string $city;
    public string $zip;
    /** @var string[] */
    public array $lines;

    public static function fromArray(array $data): self
    {
        $self = new self();
        $self->country = $data['country'];
        $self->city = $data['city'];
        $self->zip = $data['zip'];
        $self->lines = $data['lines'];
        return $self;
    }
}
