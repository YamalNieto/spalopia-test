<?php

namespace Spalopia\SpaServices\Application\SearchAll;

use Spalopia\SpaServices\Application\SpaServiceResponse;
use Spalopia\SpaServices\Application\SpaServicesResponse;
use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\SpaServices\Domain\SpaServiceRepository;
use function Lambdish\Phunctional\map;

final readonly class AllSpaServicesSearcher
{
    public function __construct(private SpaServiceRepository $repository) {}

    public function __invoke(): SpaServicesResponse
    {
        return new SpaServicesResponse(...map($this->toResponse(), $this->repository->searchAll()));
    }

    private function toResponse(): callable
    {
        return static fn (SpaService $service): SpaServiceResponse => new SpaServiceResponse(
            $service->id()->value(),
            $service->name()->value(),
            $service->price()->value(),
        );
    }
}
