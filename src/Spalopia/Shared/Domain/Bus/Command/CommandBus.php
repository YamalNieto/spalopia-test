<?php

declare(strict_types=1);

namespace Spalopia\Shared\Domain\Bus\Command;

interface CommandBus
{
	public function dispatch(Command $command): void;
}
