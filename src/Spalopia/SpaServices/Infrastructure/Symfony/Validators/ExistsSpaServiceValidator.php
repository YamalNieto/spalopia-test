<?php

namespace Spalopia\SpaServices\Infrastructure\Symfony\Validators;

use Spalopia\SpaServices\Domain\SpaServiceId;
use Spalopia\SpaServices\Domain\SpaServiceRepository;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

final class ExistsSpaServiceValidator extends ConstraintValidator
{
    public function __construct(private readonly SpaServiceRepository $repository)
    {
    }

    public function validate($value, Constraint $constraint): void
    {
        if (null === $value || '' === $value) {
            return;
        }

        $spaService = $this->repository->search(new SpaServiceId($value));

        if (!$spaService) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        }
    }
}
