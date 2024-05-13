<?php

namespace Spalopia\SpaServices\Infrastructure\Persistence;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Spalopia\TimeSlots\Domain\TimeSlot;
use Spalopia\TimeSlots\Domain\TimeSlotDay;

final class DoctrineSpaServiceRepository implements SpaServiceRepository
{
    private EntityManagerInterface                $entityManager;
    private SpaServiceRepository|EntityRepository $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
        $this->repository = $this->entityManager->getRepository(SpaService::class);
    }

    public function save(SpaService $spaService): void
    {
        $this->entityManager->persist($spaService);
        $this->entityManager->flush($spaService);
    }

    public function search(SpaServiceId $id): ?SpaService
    {
        return $this->repository->find($id);
    }

    public function searchAll(): array
    {
        return $this->repository->findAll();
    }

    public function searchTimeSlots(SpaServiceId $id, TimeSlotDay $day): array
    {
        return $this->repository->createQueryBuilder('s')
            ->select('t')
            ->from(TimeSlot::class, 't')
            ->andWhere('t.serviceId = :serviceId')
            ->setParameter('serviceId', $id->value())
            ->andWhere('t.available.value = :available')
            ->setParameter('available', true)
            ->andWhere('t.day.value = :day')
            ->setParameter('day', $day->value())
            ->getQuery()
            ->getResult();
    }
}
