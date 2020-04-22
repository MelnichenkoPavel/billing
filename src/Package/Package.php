<?php

namespace Billing\Package;

use Billing\Discount;
use Billing\Feature;
use Billing\Limit;

class Package implements \Billing\Package {

    private Feature $feature;

    private Discount $discount;

    private array $limits;

    private float $price;

    public function __construct(Feature $feature, Discount $discount, float $price, Limit ...$limits)
    {
        $this->feature = $feature;
        $this->discount = $discount;
        $this->price = $price;
        $this->limits = $limits;
    }

    public function name(): string
    {
        if ([] === $this->limits) {
            return $this->feature->name();
        }

        $suffix = implode(', ', array_map(static function (Limit $limit) {
            return $limit->name();
        }, $this->limits));

        return "{$this->feature->name()} [{$suffix}]";
    }

    public function price(): float
    {
        return $this->discount->apply($this->price);
    }
}