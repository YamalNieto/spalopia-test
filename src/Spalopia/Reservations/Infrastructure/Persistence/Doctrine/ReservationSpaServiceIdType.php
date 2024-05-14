<?php

namespace Spalopia\Reservations\Infrastructure\Persistence\Doctrine;

use Spalopia\Reservations\Domain\ReservationSpaServiceId;
use Spalopia\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class ReservationSpaServiceIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return ReservationSpaServiceId::class;
    }
}
