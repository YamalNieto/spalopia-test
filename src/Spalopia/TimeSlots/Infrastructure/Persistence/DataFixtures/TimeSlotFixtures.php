<?php

namespace Spalopia\TimeSlots\Infrastructure\Persistence\DataFixtures;

use DateTimeImmutable;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Spalopia\TimeSlots\Domain\TimeSlot;
use Spalopia\TimeSlots\Domain\TimeSlotAvailable;
use Spalopia\TimeSlots\Domain\TimeSlotDay;
use Spalopia\TimeSlots\Domain\TimeSlotEnd;
use Spalopia\TimeSlots\Domain\TimeSlotRepository;
use Spalopia\TimeSlots\Domain\TimeSlotSpaServiceId;
use Spalopia\TimeSlots\Domain\TimeSlotStart;

class TimeSlotFixtures extends Fixture
{
    private const SPA_SERVICES_IDS = [
        '11bcf8eb-9b08-4509-b8d5-f93902a16939',
        '065702a5-1c7d-4d01-8170-c0a53631d17d',
        '89d60193-a4e1-4431-8cf9-fca16d1499ed',
    ];

    private const TIME_SLOTS = [
        [
            'day' => 'now',
            'start' => '09:00',
            'end' => '10:00',
            'availability' => true,
        ],
        [
            'day' => 'now',
            'start' => '10:00',
            'end' => '11:00',
            'availability' => true,
        ],
        [
            'day' => 'now',
            'start' => '11:00',
            'end' => '12:00',
            'availability' => true,
        ],
        [
            'day' => '+1 day',
            'start' => '09:00',
            'end' => '10:00',
            'availability' => true,
        ],
        [
            'day' => '+1 day',
            'start' => '10:00',
            'end' => '11:00',
            'availability' => true,
        ],
        [
            'day' => '+1 day',
            'start' => '11:00',
            'end' => '12:00',
            'availability' => true,
        ],
    ];

    public function __construct(private readonly TimeSlotRepository $repository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::SPA_SERVICES_IDS as $spaServicesId) {

            foreach (self::TIME_SLOTS as $timeSlot) {
                $timeSlot = TimeSlot::create(
                    null,
                    new TimeSlotSpaServiceId($spaServicesId),
                    new TimeSlotDay(new DateTimeImmutable($timeSlot['day'])),
                    new TimeSlotStart($timeSlot['start']),
                    new TimeSlotEnd($timeSlot['end']),
                    new TimeSlotAvailable($timeSlot['availability'])
                );
                $this->repository->save($timeSlot);
            }
        }
    }
}
