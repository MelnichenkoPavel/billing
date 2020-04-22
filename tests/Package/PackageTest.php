<?php

namespace BillingTests\Package;

use Billing\Discount\FixedDiscount;
use Billing\Feature\Feature;
use Billing\Limit\Limit;
use Billing\Package\Package;
use Billing\Restriction\Restriction;
use PHPUnit\Framework\TestCase;

final class PackageTest extends TestCase {

    public function testNameWithoutLimits(): void {

        $package = new Package(
            new Feature(Feature::class),
            new FixedDiscount(0),
            0
        );

        $this->assertEquals(Feature::class, $package->name());
    }

    public function testNameWithLimits(): void {

        $package = new Package(
            new Feature(Feature::class),
            new FixedDiscount(0),
            0,
            new Limit(
                new Restriction('limit1'),
                1
            ),
            new Limit(
                new Restriction('limit2'),
                2
            )
        );

        $this->assertEquals(Feature::class . ' [limit1: 1, limit2: 2]', $package->name());
    }
}