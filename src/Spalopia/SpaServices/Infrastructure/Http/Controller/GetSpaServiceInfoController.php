<?php

namespace Spalopia\SpaServices\Infrastructure\Http\Controller;

use Spalopia\Shared\Domain\Bus\Query\QueryBus;
use Spalopia\SpaServices\Application\SearchTimeSlots\SearchSpaServiceTimeSlotsQuery;
use Spalopia\SpaServices\Application\SpaServiceResponse;
use Spalopia\TimeSlots\Domain\TimeSlot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetSpaServiceInfoController extends AbstractController
{
    public function __construct(private readonly QueryBus $queryBus)
    {
    }

    public function __invoke(string $id, Request $request): JsonResponse
    {
        $day = $request->get('day') ?? (new \DateTimeImmutable())->format('Y-m-d');

        /** @var SpaServiceResponse $response */
        $response = $this->queryBus->ask(
            new SearchSpaServiceTimeSlotsQuery($id, $day),
        );

        return new JsonResponse([
            'id' => $response->id(),
            'name' => $response->name(),
            'price' => $response->price(),
            'timeSlots' => array_map(static function (TimeSlot $timeSlot) {
                return [
                    'id' => $timeSlot->id()->value(),
                    'day' => $timeSlot->day()->value(),
                    'start' => $timeSlot->start()->value(),
                    'end' => $timeSlot->end()->value(),
                ];
            }, $response->timeSlots())
        ],
        200);
    }
}
