<?php

namespace Billing;

interface Subscription {

    public function price(): float;
}