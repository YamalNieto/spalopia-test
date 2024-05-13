<?php

namespace Spalopia\SpaServices\Infrastructure\Persistence\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\SpaServices\Domain\SpaServiceName;
use Spalopia\SpaServices\Domain\SpaServicePrice;
use Spalopia\SpaServices\Domain\SpaServiceRepository;

class SpaServiceFixtures extends Fixture
{
    private const SPA_SERVICES = [
        [
            'id' => '11bcf8eb-9b08-4509-b8d5-f93902a16939',
            'name' => 'Masaje',
            'price' => 40,
        ],
        [
            'id' => '065702a5-1c7d-4d01-8170-c0a53631d17d',
            'name' => 'Sauna',
            'price' => 20,
        ],
        [
            'id' => '89d60193-a4e1-4431-8cf9-fca16d1499ed',
            'name' => 'Detox',
            'price' => 50,
        ],
    ];

    public function __construct(private readonly SpaServiceRepository $repository)
    {
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::SPA_SERVICES as $spaService) {
            $entity = SpaService::create(
                new SpaServiceId($spaService['id']),
                new SpaServiceName($spaService['name']),
                new SpaServicePrice($spaService['price']),
            );

            $this->repository->save($entity);
        }
    }
}
