<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\ReservationStart;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationStartMother
{
    public static function create(?string $value = null): ReservationStart
    {
        $start = $value ?? MotherCreator::random()->dateTimeBetween('09:00', '11:00')->format('H:i');

        return new ReservationStart($value ?? $start);
    }
}
