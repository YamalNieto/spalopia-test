<?php

namespace Spalopia\Reservations\Infrastructure\Symfony\Validators;

use Spalopia\Reservations\Domain\ReservationId;
use Spalopia\Reservations\Domain\ReservationRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class NotExistsReservationValidator extends ConstraintValidator
{
    public function __construct(private readonly ReservationRepository $repository)
    {
    }

    public function validate($value, Constraint $constraint): void
    {
        if (null === $value || '' === $value) {
            return;
        }

        $spaService = $this->repository->search(new ReservationId($value));

        if ($spaService) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
