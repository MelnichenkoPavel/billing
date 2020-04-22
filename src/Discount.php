<?php

namespace Billing;

interface Discount {

    public function apply(float $price): float;
}