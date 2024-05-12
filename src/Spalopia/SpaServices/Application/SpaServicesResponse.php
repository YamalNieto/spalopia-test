<?php

namespace Spalopia\SpaServices\Application;

use Spalopia\Shared\Domain\Bus\Query\Response;

final readonly class SpaServicesResponse implements Response
{
    private array $services;

    public function __construct(SpaServiceResponse ...$services)
    {
        $this->services = $services;
    }

    public function services(): array
    {
        return $this->services;
    }
}
