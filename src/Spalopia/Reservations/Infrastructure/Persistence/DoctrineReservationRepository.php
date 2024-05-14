<?php

namespace Spalopia\Reservations\Infrastructure\Persistence;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Spalopia\Reservations\Domain\Reservation;
use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Reservations\Domain\ReservationRepository;

final class DoctrineReservationRepository implements ReservationRepository
{
    private ReservationRepository|EntityRepository $repository;
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $em)
    {
        $this->entityManager = $em;
        $this->repository = $this->entityManager->getRepository(Reservation::class);
    }

    public function save(Reservation $reservation): void
    {
        $this->entityManager->persist($reservation);
        $this->entityManager->flush($reservation);
    }

    public function search(ReservationId $id): ?Reservation
    {
        return $this->repository->find($id);
    }
}
