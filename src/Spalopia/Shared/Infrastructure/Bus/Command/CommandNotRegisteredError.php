<?php

declare(strict_types=1);

namespace Spalopia\Shared\Infrastructure\Bus\Command;

use RuntimeException;
use Spalopia\Shared\Domain\Bus\Command\Command;

final class CommandNotRegisteredError extends RuntimeException
{
	public function __construct(Command $command)
	{
		$commandClass = $command::class;

		parent::__construct("The command <$commandClass> hasn't a command handler associated");
	}
}
