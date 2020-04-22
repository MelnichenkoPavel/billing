<?php

namespace Billing;

interface Package {

    public function name(): string;

    public function price(): float;
}