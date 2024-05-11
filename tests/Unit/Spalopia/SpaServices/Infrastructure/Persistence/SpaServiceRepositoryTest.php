<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Infrastructure\Persistence;

use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceIdMother;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceMother;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class SpaServiceRepositoryTest extends KernelTestCase
{
    private function repository(): SpaServiceRepository
    {
        return self::getContainer()->get(SpaServiceRepository::class);
    }

    public function testShouldSaveSpaService(): void
    {
        $service = SpaServiceMother::create();

        $this->repository()->save($service);

        $this->assertEquals($service, $this->repository()->search($service->id()));
    }

    public function testShouldReturnNullOnNonExistingService(): void
    {
        $this->assertNull($this->repository()->search(SpaServiceIdMother::create()));
    }
}
