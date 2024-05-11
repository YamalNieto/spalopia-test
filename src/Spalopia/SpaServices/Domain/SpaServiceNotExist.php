<?php

namespace Spalopia\SpaServices\Domain;

use DomainException;

final class SpaServiceNotExist extends DomainException
{
    public function errorCode(): string
    {
        return 'spa_service_not_exist';
    }
}
