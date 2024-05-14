<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\ReservationSpaServiceId;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationSpaServiceIdMother
{
    public static function create(?string $value = null): ReservationSpaServiceId
    {
        return new ReservationSpaServiceId($value ?? MotherCreator::random()->uuid());
    }
}
