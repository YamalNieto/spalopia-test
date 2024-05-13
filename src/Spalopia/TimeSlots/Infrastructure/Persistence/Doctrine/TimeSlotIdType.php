<?php

namespace Spalopia\TimeSlots\Infrastructure\Persistence\Doctrine;

use Spalopia\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Spalopia\TimeSlots\Domain\TimeSlotId;

final class TimeSlotIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return TimeSlotId::class;
    }
}
