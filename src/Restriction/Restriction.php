<?php

namespace Billing\Restriction;

class Restriction implements \Billing\Restriction {

    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }
}