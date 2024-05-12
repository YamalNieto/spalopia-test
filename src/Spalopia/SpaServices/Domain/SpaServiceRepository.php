<?php

declare(strict_types=1);

namespace Spalopia\SpaServices\Domain;

interface SpaServiceRepository
{
	public function save(SpaService $spaService): void;

	public function search(SpaServiceId $id): ?SpaService;

    public function searchAll(): array;
}
