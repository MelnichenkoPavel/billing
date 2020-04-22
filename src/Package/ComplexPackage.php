<?php

namespace Billing\Package;

use Billing\Discount;
use Billing\Package;

class ComplexPackage implements Package {

    private Discount $discount;

    private string $name;

    private array $packages;

    public function __construct(string $name, Discount $discount, Package ...$packages)
    {
        $this->name = $name;
        $this->discount = $discount;
        $this->packages = $packages;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        $priceWithoutDiscount = 0;
        foreach ($this->packages as $package) {
            $priceWithoutDiscount += $package->price();
        }
        return $this->discount->apply($priceWithoutDiscount);
    }

}