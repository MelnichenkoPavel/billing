<?php

namespace BillingTests\Discount;

use Billing\Discount\RelativeDiscount;
use PHPUnit\Framework\TestCase;

class RelativeDiscountTest extends TestCase {

    public function testZero(): void {

        $discount = new RelativeDiscount(1);

        $this->assertEquals(0, $discount->apply(100));
    }

    public function testNoZero(): void {

        $discount = new RelativeDiscount(0.5);

        $this->assertEquals(50, $discount->apply(100));
    }
}