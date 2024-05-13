<?php

namespace Spalopia\Tests\Unit\Spalopia\SpaServices\Infrastructure\Persistence;

use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceIdMother;
use Spalopia\Tests\Unit\Spalopia\SpaServices\Domain\SpaServiceMother;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotAvailableMother;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotMother;
use Spalopia\Tests\Unit\Spalopia\TimeSlots\Domain\Mothers\TimeSlotSpaServiceIdMother;
use Spalopia\TimeSlots\Domain\TimeSlotRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\ResetDatabase;

final class SpaServiceRepositoryTest extends KernelTestCase
{
    use ResetDatabase;

    private function spaRepository(): SpaServiceRepository
    {
        return self::getContainer()->get(SpaServiceRepository::class);
    }

    private function timeSlotRepository(): TimeSlotRepository
    {
        return self::getContainer()->get(TimeSlotRepository::class);
    }

    public function testShouldSaveSpaService(): void
    {
        $service = SpaServiceMother::create();

        $this->spaRepository()->save($service);

        $this->assertEquals($service, $this->spaRepository()->search($service->id()));
    }

    public function testShouldReturnNullOnNonExistingService(): void
    {
        $this->assertNull($this->spaRepository()->search(SpaServiceIdMother::create()));
    }

    public function testShouldReturnSpaServiceAndCorrectTimeSlots(): void
    {
        $spaService = SpaServiceMother::create();
        $spaService2 = SpaServiceMother::create();
        $timeSlot = TimeSlotMother::create(
            serviceId: TimeSlotSpaServiceIdMother::create($spaService->id()),
            available: TimeSlotAvailableMother::create(true)
        );
        $timeSlotBooked = TimeSlotMother::create(
            serviceId: TimeSlotSpaServiceIdMother::create($spaService->id()),
            available: TimeSlotAvailableMother::create(false)
        );

        $this->spaRepository()->save($spaService);
        $this->timeSlotRepository()->save($timeSlot);

        $response = $this->spaRepository()->searchTimeSlots($spaService->id(), $timeSlot->day());
        $this->assertEquals([$timeSlot], $response);
    }
}
