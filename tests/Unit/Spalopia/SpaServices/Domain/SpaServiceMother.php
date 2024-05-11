<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Domain;

use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\SpaServices\Domain\SpaServiceName;
use Spalopia\SpaServices\Domain\SpaServicePrice;

final class SpaServiceMother
{
    public static function create(
        ?SpaServiceId $id = null,
        ?SpaServiceName $name = null,
        ?SpaServicePrice $price = null
    ): SpaService {
        return SpaService::create(
            $id ?? SpaServiceIdMother::create(),
            $name ?? SpaServiceNameMother::create(),
            $price ?? SpaServicePriceMother::create(),
        );
    }
}
