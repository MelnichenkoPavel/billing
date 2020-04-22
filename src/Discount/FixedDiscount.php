<?php

namespace Billing\Discount;

use Billing\Discount;

class FixedDiscount implements Discount {

    private float $value;

    public function __construct(float $value)
    {
        $this->value = $value;
    }

    public function apply(float $price): float
    {
        if ($price > $this->value) {
            return $price - $this->value;
        }
        return 0;
    }
}