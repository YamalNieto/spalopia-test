<?php

namespace Spalopia\Reservations\Infrastructure\Persistence\Doctrine;

use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class ReservationIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return ReservationId::class;
    }
}
