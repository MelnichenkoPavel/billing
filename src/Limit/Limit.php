<?php

namespace Billing\Limit;

use Billing\Restriction;

class Limit implements \Billing\Limit {

    private Restriction $restriction;

    private int $value;

    public function __construct(Restriction $restriction, int $value)
    {
        $this->restriction = $restriction;
        $this->value = $value;
    }

    public function name(): string
    {
        return "{$this->restriction->name()}: {$this->value}";
    }
}