<?php

namespace Spalopia\TimeSlots\Infrastructure\Persistence;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Spalopia\TimeSlots\Domain\TimeSlot;
use Spalopia\TimeSlots\Domain\TimeSlotId;
use Spalopia\TimeSlots\Domain\TimeSlotRepository;

final class DoctrineTimeSlotRepository implements TimeSlotRepository
{
    private EntityManagerInterface $entityManager;
    private TimeSlotRepository|EntityRepository $repository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
        $this->repository = $this->entityManager->getRepository(TimeSlot::class);
    }

    public function save(TimeSlot $timeSlot): void
    {
        $this->entityManager->persist($timeSlot);
        $this->entityManager->flush($timeSlot);
    }

    public function search(TimeSlotId $id): ?TimeSlot
    {
        return $this->repository->find($id);
    }
}
