<?php

declare(strict_types=1);

namespace Spalopia\Shared\Domain\ValueObject;

abstract class FloatValueObject
{
	public function __construct(protected float $value) {}

	final public function value(): float
	{
		return $this->value;
	}

	final public function isBiggerThan(self $other): bool
	{
		return $this->value() > $other->value();
	}
}
