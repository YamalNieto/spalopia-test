<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Domain;

use Spalopia\SpaServices\Domain\SpaServiceName;
use Spalopia\Tests\Unit\Shared\Domain\MotherCreator;

final class SpaServiceNameMother
{
    public static function create(?string $value = null): SpaServiceName
    {
        return new SpaServiceName($value ?? MotherCreator::random()->word());
    }
}
