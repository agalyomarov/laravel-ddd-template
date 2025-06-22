<?php

namespace App\Domain\Payment\ValueObjects;

class Name
{
    private string $first;
    private string $last;
    private string $fathers;
    private string $nick;

    public function __construct($first, $last, $fathers, $nick)
    {
        //Validation. Valid properties or Exception
        $this->first = $this->validateFirst($first);
        $this->last = $last;
        $this->fathers = $fathers;
        $this->nick = $nick;
    }

    private function validateFirst($data)
    {
        //Validation. Valid data or Exception
        return $data;
    }

    //TODO create getters.no setters
}
