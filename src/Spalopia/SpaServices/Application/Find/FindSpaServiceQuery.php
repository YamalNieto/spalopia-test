<?php

namespace Spalopia\SpaServices\Application\Find;

use Spalopia\Shared\Domain\Bus\Query\Query;

final readonly class FindSpaServiceQuery implements Query
{
    public function __construct(private string $id) {}

    public function id(): string
    {
        return $this->id;
    }
}
