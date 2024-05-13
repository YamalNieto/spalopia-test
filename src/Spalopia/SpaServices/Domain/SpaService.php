<?php

namespace Spalopia\SpaServices\Domain;

final readonly class SpaService
{
    private function __construct(
        private SpaServiceId $id,
        private SpaServiceName $name,
        private SpaServicePrice $price
    ) {}

    public static function create(?SpaServiceId $id, SpaServiceName $name, SpaServicePrice $price): self
    {
        return new self($id ?? SpaServiceId::random(), $name, $price);
    }

    public function id(): SpaServiceId
    {
        return $this->id;
    }

    public function name(): SpaServiceName
    {
        return $this->name;
    }

    public function price(): SpaServicePrice
    {
        return $this->price;
    }
}
