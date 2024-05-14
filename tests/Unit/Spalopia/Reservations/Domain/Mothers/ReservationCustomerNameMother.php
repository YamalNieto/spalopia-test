<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\ReservationCustomerName;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationCustomerNameMother
{
    public static function create(?string $value = null): ReservationCustomerName
    {
        return new ReservationCustomerName($value ?? MotherCreator::random()->name());
    }
}
