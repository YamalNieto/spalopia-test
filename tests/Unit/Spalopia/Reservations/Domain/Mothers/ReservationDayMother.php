<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use DateTimeImmutable;
use Spalopia\Reservations\Domain\ReservationDay;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class ReservationDayMother
{
    public static function create(?DateTimeImmutable $value = null): ReservationDay
    {
        return new ReservationDay(
            $value ??
            DateTimeImmutable::createFromMutable(MotherCreator::random()->dateTimeBetween('+1 day', '+2 days'))
        );
    }
}
