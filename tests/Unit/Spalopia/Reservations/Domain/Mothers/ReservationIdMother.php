<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationIdMother
{
    public static function create(?string $value = null): ReservationId
    {
        return new ReservationId($value ?? MotherCreator::random()->uuid());
    }
}
