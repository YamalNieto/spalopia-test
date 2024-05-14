<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\ReservationCustomerEmail;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationCustomerEmailMother
{
    public static function create(?string $value = null): ReservationCustomerEmail
    {
        return new ReservationCustomerEmail($value ?? MotherCreator::random()->email());
    }
}
