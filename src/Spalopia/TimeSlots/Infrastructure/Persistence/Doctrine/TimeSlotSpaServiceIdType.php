<?php

namespace Spalopia\TimeSlots\Infrastructure\Persistence\Doctrine;

use Spalopia\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Spalopia\TimeSlots\Domain\TimeSlotSpaServiceId;

final class TimeSlotSpaServiceIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return TimeSlotSpaServiceId::class;
    }
}
