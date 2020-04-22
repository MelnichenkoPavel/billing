<?php

namespace Billing\Discount;

use Billing\Discount;

class RelativeDiscount implements Discount {

    private float $percent;

    public function __construct(float $percent)
    {
        $this->percent = $percent;
    }

    public function apply(float $price): float
    {
        $discount = $price * $this->percent;
        if ($price > $discount) {
            return $price - $discount;
        }
        return 0;
    }
}