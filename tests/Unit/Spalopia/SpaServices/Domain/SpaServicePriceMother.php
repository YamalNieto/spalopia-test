<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Domain;

use Spalopia\SpaServices\Domain\SpaServicePrice;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class SpaServicePriceMother
{
    public static function create(?float $value = null): SpaServicePrice
    {
        return new SpaServicePrice($value ?? MotherCreator::random()->randomFloat(2, 0, 100));
    }
}
