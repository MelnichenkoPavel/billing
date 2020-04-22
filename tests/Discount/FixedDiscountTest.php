<?php

namespace BillingTests\Discount;

use Billing\Discount\FixedDiscount;
use PHPUnit\Framework\TestCase;

final class FixedDiscountTest extends TestCase {

    public function testZero(): void {

        $discount = new FixedDiscount(100);

        $this->assertEquals(0, $discount->apply(0));
    }

    public function testNoZero(): void {

        $discount = new FixedDiscount(100);

        $this->assertEquals(10, $discount->apply(110));
    }
}