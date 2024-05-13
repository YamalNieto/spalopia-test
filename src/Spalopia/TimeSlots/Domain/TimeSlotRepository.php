<?php

declare(strict_types=1);

namespace Spalopia\TimeSlots\Domain;

interface TimeSlotRepository
{
	public function save(TimeSlot $timeSlot): void;

	public function search(TimeSlotId $id): ?TimeSlot;
}
