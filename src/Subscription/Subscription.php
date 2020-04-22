<?php

namespace Billing\Subscription;

use Billing\Discount;
use Billing\Package;

class Subscription implements \Billing\Subscription {

    private \DatePeriod $period;

    private Discount $discount;

    private array $packages;

    public function __construct(\DatePeriod $period, Discount $discount, Package ...$packages)
    {
        $this->period = $period;
        $this->discount = $discount;
        $this->packages = $packages;
    }

    public function price(): float {
        $priceWithoutDiscount = 0;
        foreach ($this->packages as $package) {
            $priceWithoutDiscount += $package->price();
        }

        $result = 0;
        foreach ($this->period as $date) {
            $result += $this->discount->apply($priceWithoutDiscount);
        }
        return $result;
    }
}