<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Application\Find;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Spalopia\SpaServices\Application\Find\FindSpaServiceQuery;
use Spalopia\SpaServices\Application\Find\FindSpaServiceQueryHandler;
use Spalopia\SpaServices\Application\Find\SpaServiceFinder;
use Spalopia\SpaServices\Domain\SpaServiceNotExist;
use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceIdMother;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceMother;

class FindSpaServiceQueryHandlerTest extends TestCase
{
    private SpaServiceRepository|MockObject|null $repository;
    private FindSpaServiceQueryHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(SpaServiceRepository::class);
        $this->handler = new FindSpaServiceQueryHandler(
            new SpaServiceFinder($this->repository),
        );
    }

    public function testShouldFindSpaServiceOnExistingSpaService(): void
    {
        $service = SpaServiceMother::create();
        $query = new FindSpaServiceQuery($service->id());
        $response = SpaServiceResponseMother::create($service);

        $this->repository->method('search')->willReturnOnConsecutiveCalls($service);

        $this->assertEquals($response, $this->handler->__invoke($query));
    }

    public function testShouldThrowExceptionOnNotExistingSpaService(): void
    {
        $this->repository->method('search')->willReturnOnConsecutiveCalls(null);

        $this->expectException(SpaServiceNotExist::class);
        $this->handler->__invoke(new FindSpaServiceQuery(SpaServiceIdMother::create()));
    }
}
