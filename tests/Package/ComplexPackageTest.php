<?php

namespace BillingTests\Package;

use Billing\Discount\FixedDiscount;
use Billing\Feature\Feature;
use Billing\Package\ComplexPackage;
use Billing\Package\Package;
use PHPUnit\Framework\TestCase;

final class ComplexPackageTest extends TestCase {

    public function testPrice(): void {

        $package = new ComplexPackage(
            ComplexPackage::class,
            new FixedDiscount(50),
            new Package(
                new Feature(Feature::class),
                new FixedDiscount(0),
                100.0
            ),
            new Package(
                new Feature(Feature::class),
                new FixedDiscount(0),
                200.0
            ),
        );

        $this->assertEquals(250, $package->price());
    }
}