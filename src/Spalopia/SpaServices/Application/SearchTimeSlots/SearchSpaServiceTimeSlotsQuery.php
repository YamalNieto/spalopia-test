<?php

namespace Spalopia\SpaServices\Application\SearchTimeSlots;

use Spalopia\Shared\Domain\Bus\Query\Query;

final readonly class SearchSpaServiceTimeSlotsQuery implements Query
{
    public function __construct(private string $id, private string $day) {}

    public function id(): string
    {
        return $this->id;
    }

    public function day(): string
    {
        return $this->day;
    }
}
