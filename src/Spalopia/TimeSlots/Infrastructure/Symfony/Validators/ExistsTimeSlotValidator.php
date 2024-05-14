<?php

namespace Spalopia\TimeSlots\Infrastructure\Symfony\Validators;

use Spalopia\TimeSlots\Domain\TimeSlotId;
use Spalopia\TimeSlots\Domain\TimeSlotRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class ExistsTimeSlotValidator extends ConstraintValidator
{
    public function __construct(private readonly TimeSlotRepository $repository)
    {
    }

    public function validate($value, Constraint $constraint): void
    {
        if (null === $value || '' === $value) {
            return;
        }

        $spaService = $this->repository->search(new TimeSlotId($value));

        if (!$spaService) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
