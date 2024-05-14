<?php

namespace Spalopia\TimeSlots\Application;

use Spalopia\Shared\Domain\Bus\Query\Response;

final readonly class TimeSlotResponse implements Response
{
    public function __construct(
        private string $id,
        private string $serviceId,
        private string $day,
        private string $startTime,
        private string $endTime,
        private bool $available)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function serviceId(): string
    {
        return $this->serviceId;
    }

    public function day(): string
    {
        return $this->day;
    }

    public function startTime(): string
    {
        return $this->startTime;
    }

    public function endTime(): string
    {
        return $this->endTime;
    }

    public function available(): bool
    {
        return $this->available;
    }
}
