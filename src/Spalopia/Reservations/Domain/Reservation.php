<?php

namespace Spalopia\Reservations\Domain;

final readonly class Reservation
{
    private function __construct(
        private ReservationId $id,
        private ReservationCustomerName $customerName,
        private ReservationCustomerEmail $customerEmail,
        private ReservationDay $day,
        private ReservationStart $start,
        private ReservationSpaServiceId $serviceId,
        private ReservationPrice $price,
    ) {}

    public static function create(
        ?ReservationId $id,
        ReservationCustomerName $customerName,
        ReservationCustomerEmail $customerEmail,
        ReservationDay $day,
        ReservationStart $start,
        ReservationSpaServiceId $serviceId,
        ReservationPrice $price): self
    {
        return new self($id ?? ReservationId::random(), $customerName, $customerEmail, $day, $start, $serviceId, $price);
    }

    public function id(): ReservationId
    {
        return $this->id;
    }

    public function customerName(): ReservationCustomerName
    {
        return $this->customerName;
    }

    public function customerEmail(): ReservationCustomerEmail
    {
        return $this->customerEmail;
    }

    public function day(): ReservationDay
    {
        return $this->day;
    }

    public function start(): ReservationStart
    {
        return $this->start;
    }

    public function serviceId(): ReservationSpaServiceId
    {
        return $this->serviceId;
    }

    public function price(): ReservationPrice
    {
        return $this->price;
    }
}
