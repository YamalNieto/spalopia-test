<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Application;

use Spalopia\SpaServices\Application\SpaServiceResponse;
use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceMother;

final class SpaServiceResponseMother
{
    public static function create(?SpaService $service = null): SpaServiceResponse
    {
        $service = $service ?? SpaServiceMother::create();

        return new SpaServiceResponse(
            $service->id()->value(),
            $service->name()->value(),
            $service->price()->value(),
        );
    }
}
