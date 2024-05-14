<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers;

use Spalopia\Reservations\Domain\Reservation;
use Spalopia\Reservations\Domain\ReservationCustomerEmail;
use Spalopia\Reservations\Domain\ReservationCustomerName;
use Spalopia\Reservations\Domain\ReservationDay;
use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Reservations\Domain\ReservationPrice;
use Spalopia\Reservations\Domain\ReservationSpaServiceId;
use Spalopia\Reservations\Domain\ReservationStart;

final class ReservationMother
{
    public static function create(
        ?ReservationId $id = null,
        ?ReservationCustomerName $customerName = null,
        ?ReservationCustomerEmail $customerEmail = null,
        ?ReservationDay $day = null,
        ?ReservationStart $start = null,
        ?ReservationSpaServiceId $serviceId = null,
        ?ReservationPrice $price = null,
    ): Reservation {
        return Reservation::create(
            $id ?? ReservationIdMother::create(),
            $customerName ?? ReservationCustomerNameMother::create(),
            $customerEmail ?? ReservationCustomerEmailMother::create(),
            $day ?? ReservationDayMother::create(),
            $start ?? ReservationStartMother::create(),
            $serviceId ?? ReservationSpaServiceIdMother::create(),
            $price ?? ReservationPriceMother::create(),
        );
    }
}
