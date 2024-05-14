<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\ReservationPrice;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationPriceMother
{
    public static function create(?float $value = null): ReservationPrice
    {
        return new ReservationPrice($value ?? MotherCreator::random()->randomFloat(2, 0, 100));
    }
}
