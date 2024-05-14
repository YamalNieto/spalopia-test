<?php

namespace Spalopia\Tests\Unit\Spalopia\Reservations\Domain;

use PHPUnit\Framework\TestCase;
use Spalopia\Reservations\Domain\InvalidReservationCustomerEmailException;
use Spalopia\Tests\Unit\Spalopia\Reservations\Domain\Mothers\ReservationCustomerEmailMother;

final class ReservationCustomerEmailTest extends TestCase
{
    public function wrongEmailProvider(): array
    {
        return [
            ['spalopia.test'],
            ['spalopia.test.com'],
            ['@spalopia.com'],
            ['spalopia.test@spalopia'],
        ];
    }

    /**
     * @dataProvider wrongEmailProvider
     */
    public function testShouldThrowExceptionOnWrongFormatEmail($email): void
    {
        $this->expectException(InvalidReservationCustomerEmailException::class);

        ReservationCustomerEmailMother::create($email);
    }
}
