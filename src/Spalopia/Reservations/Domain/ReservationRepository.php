<?php

declare(strict_types=1);

namespace Spalopia\Reservations\Domain;

interface ReservationRepository
{
	public function save(Reservation $reservation): void;

	public function search(ReservationId $id): ?Reservation;
}
