<?php

declare(strict_types=1);

namespace Spalopia\Shared\Infrastructure\Persistence\Doctrine;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use Spalopia\Shared\Domain\Utils;
use Spalopia\Shared\Domain\ValueObject\Uuid;
use Spalopia\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;

use function Lambdish\Phunctional\last;

abstract class UuidType extends StringType implements DoctrineCustomType
{
	abstract protected function typeClassName(): string;

	final public static function customTypeName(): string
	{
		return Utils::toSnakeCase(str_replace('Type', '', (string) last(explode('\\', static::class))));
	}

	final public function getName(): string
	{
		return self::typeClassName();
	}

	final public function convertToPHPValue($value, AbstractPlatform $platform): mixed
	{
		$className = $this->typeClassName();

		return new $className($value);
	}

	final public function convertToDatabaseValue($value, AbstractPlatform $platform): string
	{
		/** @var Uuid $value */
		return $value->value();
	}
}
