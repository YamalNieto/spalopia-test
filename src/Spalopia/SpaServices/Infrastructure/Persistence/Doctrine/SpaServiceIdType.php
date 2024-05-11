<?php

namespace Spalopia\SpaServices\Infrastructure\Persistence\Doctrine;

use Spalopia\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Spalopia\SpaServices\Domain\SpaServiceId;

final class SpaServiceIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return 'spa_service_id';
    }
}
