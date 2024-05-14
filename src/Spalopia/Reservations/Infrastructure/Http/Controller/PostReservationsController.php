<?php

namespace Spalopia\Reservations\Infrastructure\Http\Controller;

use Spalopia\Reservations\Domain\Reservation;
use Spalopia\Reservations\Infrastructure\Symfony\Validators\NotExistsReservation;
use Spalopia\Reservations\Application\Create\CreateReservationCommand;
use Spalopia\Shared\Domain\Bus\Command\CommandBus;
use Spalopia\SpaServices\Domain\SpaService;
use Spalopia\SpaServices\Infrastructure\Symfony\Validators\ExistsSpaService;
use Spalopia\TimeSlots\Domain\TimeSlot;
use Spalopia\TimeSlots\Infrastructure\Symfony\Validators\ExistsTimeSlot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PostReservationsController extends AbstractController
{
    public function __construct(private readonly CommandBus $commandBus, private readonly ValidatorInterface $validator)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $messageErrors = $this->validateRequest($request);

        if (count($messageErrors['errors']) > 0) {
            $response = new JsonResponse($messageErrors);
            $response->send();
        }

        $input = $request->toArray();

        $this->commandBus->dispatch(
            new CreateReservationCommand(
                $input['id'],
                $input['customerName'],
                $input['customerEmail'],
//                $input['day'],
//                $input['start'],
                $input['serviceId'],
                $input['price'],
                $input['timeSlotId'],
            ),
        );

        return new JsonResponse(
            [
                'result' => 'ok',
            ]
        );
    }

    private function validateRequest(Request $request): array
    {
        $constraint = new Assert\Collection(
            [
                'id' => [
                    new Assert\Uuid(),
                    new Assert\NotBlank(),
                    new NotExistsReservation(['entityClass' => Reservation::class])
                ],
                'serviceId' => [new Assert\Uuid(), new Assert\NotBlank(), new ExistsSpaService(['entityClass' => SpaService::class])],
                'timeSlotId' => [new Assert\NotBlank(), new ExistsTimeSlot(['entityClass' => TimeSlot::class])],
                'customerName' => [new Assert\NotBlank()],
                'customerEmail' => [new Assert\NotBlank(), new Assert\Email()],
//                'day' => [new Assert\Date(), new Assert\NotBlank()],
//                'start' => [new Assert\Regex('/^([0-9]|0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/'), new Assert\NotBlank()],
                'price' => [new Assert\NotBlank(), new Assert\Positive()],
            ],
        );

        $input = $request->toArray();

        $errors = $this->validator->validate($input, $constraint);

        $messages = ['message' => 'validation_failed', 'errors' => []];

        foreach ($errors as $message) {
            $messages['errors'][] = [
                'property' => $message->getPropertyPath(),
                'value' => $message->getInvalidValue(),
                'message' => $message->getMessage(),
            ];
        }

        return $messages;
    }
}
