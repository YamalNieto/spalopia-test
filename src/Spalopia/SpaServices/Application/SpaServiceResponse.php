<?php

namespace Spalopia\SpaServices\Application;

use Spalopia\Shared\Domain\Bus\Query\Response;

final readonly class SpaServiceResponse implements Response
{
    public function __construct(private string $id, private string $name, private float $price, private ?array $timeSlots = null)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function timeSlots(): ?array
    {
        return $this->timeSlots;
    }
}
