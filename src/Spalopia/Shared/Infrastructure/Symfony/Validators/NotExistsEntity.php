<?php

namespace Spalopia\Shared\Infrastructure\Symfony\Validators;

use Symfony\Component\Validator\Constraint;

class NotExistsEntity extends Constraint
{
    public $message = 'El valor "{{ value }}" ya existe en la base de datos.';
    public $entityClass;

    public function getTargets(): array|string
    {
        return self::PROPERTY_CONSTRAINT;
    }
}
