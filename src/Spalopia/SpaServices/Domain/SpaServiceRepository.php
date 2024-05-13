<?php

declare(strict_types=1);

namespace Spalopia\SpaServices\Domain;

use Spalopia\TimeSlots\Domain\TimeSlotDay;

interface SpaServiceRepository
{
	public function save(SpaService $spaService): void;

	public function search(SpaServiceId $id): ?SpaService;

    public function searchAll(): array;

    public function searchTimeSlots(SpaServiceId $id, TimeSlotDay $day): array;
}
