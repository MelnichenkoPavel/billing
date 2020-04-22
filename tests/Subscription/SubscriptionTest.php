<?php

namespace BillingTests\Subscription;

use Billing\Discount\FixedDiscount;
use Billing\Feature\Feature;
use Billing\Package\ComplexPackage;
use Billing\Package\Package;
use Billing\Subscription\Subscription;
use PHPUnit\Framework\TestCase;

final class SingleSubscriptionTest extends TestCase
{
    public function testWithoutDiscount(): void {

        $period = new \DatePeriod(
            new \DateTimeImmutable('2020-04-01'),
            new \DateInterval('P1M'),
            new \DateTimeImmutable('2020-05-02')
        );

        $subscription = new Subscription(
            $period,
            new FixedDiscount(0),
            new ComplexPackage(
                'Basic Package',
                new FixedDiscount(0),
                new Package(
                    new Feature('FB to GA'),
                    new FixedDiscount(0),
                    5000.0
                ),
                new Package(
                    new Feature('Streaming'),
                    new FixedDiscount(0),
                    10000.0
                )
            ),
            new Package(
                new Feature('Monitoring'),
                new FixedDiscount(0),
                1000.0
            )
        );

        $this->assertEquals(32000.0, $subscription->price());
    }

    public function testWithDiscount(): void {

        $period = new \DatePeriod(
            new \DateTimeImmutable('2020-04-01'),
            new \DateInterval('P1M'),
            new \DateTimeImmutable('2020-05-02')
        );

        $subscription = new Subscription(
            $period,
            new FixedDiscount(100.0),
            new ComplexPackage(
                'Basic Package',
                new FixedDiscount(0),
                new Package(
                    new Feature('FB to GA'),
                    new FixedDiscount(0),
                    5000.0
                ),
                new Package(
                    new Feature('Streaming'),
                    new FixedDiscount(0),
                    10000.0
                )
            ),
            new Package(
                new Feature('Monitoring'),
                new FixedDiscount(0),
                1000.0
            )
        );

        $this->assertEquals(31800.0, $subscription->price());
    }
}