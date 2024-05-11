<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Domain;

use Spalopia\Shared\Domain\ValueObject\Uuid;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class SpaServiceIdMother
{
    public static function create(?string $value = null): SpaServiceId
    {
        return new SpaServiceId($value ?? MotherCreator::random()->uuid());
    }
}
