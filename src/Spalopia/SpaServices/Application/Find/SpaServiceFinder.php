<?php

namespace Spalopia\SpaServices\Application\Find;

use Spalopia\SpaServices\Domain\SpaServiceNotExist;
use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\SpaServices\Domain\SpaServiceRepository;

final readonly class SpaServiceFinder
{
    public function __construct(private SpaServiceRepository $repository) {}

    public function __invoke(SpaServiceId $id): SpaService
    {
        $service = $this->repository->search($id);

        if (null === $service) {
            throw new SpaServiceNotExist(sprintf('The spa service <%s> does not exist', $id->value()));
        }

        return $service;
    }
}
