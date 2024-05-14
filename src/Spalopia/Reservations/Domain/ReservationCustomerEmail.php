<?php

namespace Spalopia\Reservations\Domain;

use Spalopia\Shared\Domain\ValueObject\StringValueObject;

final class ReservationCustomerEmail extends StringValueObject
{
    public function __construct(string $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidReservationCustomerEmailException('You must use a valid email.');
        }

        parent::__construct($value);
    }
}
