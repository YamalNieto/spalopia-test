<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Application\SearchAll;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Spalopia\SpaServices\Application\SearchAll\AllSpaServicesSearcher;
use Spalopia\SpaServices\Application\SearchAll\SearchAllSpaServiceQuery;
use Spalopia\SpaServices\Application\SearchAll\SearchAllSpaServiceQueryHandler;
use Spalopia\SpaServices\Application\SpaServiceResponse;
use Spalopia\SpaServices\Application\SpaServicesResponse;
use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceMother;

class SearchAllSpaServiceQueryHandlerTest extends TestCase
{
    private SpaServiceRepository|MockObject|null $repository;
    private SearchAllSpaServiceQueryHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->repository = $this->createMock(SpaServiceRepository::class);
        $this->handler = new SearchAllSpaServiceQueryHandler(
            new AllSpaServicesSearcher($this->repository),
        );
    }

    public function testShouldReturnAllSpaServicesOnSearchAllMethod(): void
    {
        $massage = SpaServiceMother::create();
        $sauna = SpaServiceMother::create();
        $response = new SpaServicesResponse(
            new SpaServiceResponse(
                $massage->id()->value(),
                $massage->name()->value(),
                $massage->price()->value(),
            ),
            new SpaServiceResponse(
                $sauna->id()->value(),
                $sauna->name()->value(),
                $sauna->price()->value(),
            ),
        );

        $this->repository->method('searchAll')->willReturnOnConsecutiveCalls([$massage, $sauna]);

        $this->assertEquals($response, $this->handler->__invoke(new SearchAllSpaServiceQuery()));
    }

    public function testShouldReturnEmptyResponseOnNonExistingServices()
    {
        $response = new SpaServicesResponse();

        $this->repository->method('searchAll')->willReturnOnConsecutiveCalls([]);

        $this->assertEquals($response, $this->handler->__invoke(new SearchAllSpaServiceQuery()));
    }
}
