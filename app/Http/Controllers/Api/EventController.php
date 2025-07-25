<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventFilterRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Services\EventService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventController extends Controller
{
    use AuthorizesRequests;

    private EventService $service;

    public function __construct()
    {
        $this->service = new EventService();
    }

    /**
     * @OA\Get(
     *     path="/api/events",
     *     summary="Получить список мероприятий",
     *     tags={"Мероприятия"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter (
     *          name="id",
     *          in="query",
     *          required=false,
     *      ),
     *      @OA\Parameter (
     *           name="name",
     *           in="query",
     *           required=false,
     *       ),
     *      @OA\Parameter (
     *           name="description",
     *           in="query",
     *           required=false,
     *       ),
     *      @OA\Parameter (
     *           name="address",
     *           in="query",
     *           required=false,
     *       ),
     *     @OA\Response(response="200", description="Успешно", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/EventResponseSchema"))),
     * )
     */
    public function index(EventFilterRequest $request)
    {
        $perPage = request()->query('perPage', 10);
        $filters = $request->validated();

        $events = $this->service->getEventList($perPage, $filters);

        return EventResource::collection($events);
    }

    /**
     * @OA\Post(
     *     path="/api/events",
     *     summary="Создать мероприятие (только для админа)",
     *     tags={"Мероприятия"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/EventRequestSchema"),
     *         ),
     *     ),
     *     @OA\Response(response="201", description="Создано", @OA\JsonContent(ref="#/components/schemas/EventResponseSchema")),
     *     @OA\Response(response="403", description="Нет прав")
     * )
     */
    public function store(StoreEventRequest $request)
    {
        $this->authorize('create', Event::class);

        $event = $this->service->createEvent($request);

        return new EventResource($event);
    }

    /**
     * @OA\Get(
     *     path="/api/events/{id}",
     *     summary="Просмотр мероприятия",
     *     tags={"Мероприятия"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Успешно", @OA\JsonContent(ref="#/components/schemas/EventResponseSchema")),
     *     @OA\Response(response="404", description="Не найдено")
     * )
     */
    public function show(Event $event)
    {
        return new EventResource($event);
    }

    /**
     * @OA\Put(
     *     path="/api/events/{id}",
     *     summary="Обновить мероприятие (только для админа)",
     *     tags={"Мероприятия"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(ref="#/components/schemas/EventRequestSchema"),
     *         ),
     *     ),
     *     @OA\Response(response="200", description="Обновлено", @OA\JsonContent(ref="#/components/schemas/EventResponseSchema")),
     *     @OA\Response(response="403", description="Нет прав")
     * )
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $this->authorize('update', $event);

        $this->service->updateEvent($request, $event);

        return new EventResource($event);
    }

    /**
     * @OA\Delete(
     *     path="/api/events/{id}",
     *     summary="Удалить мероприятие (только для админа)",
     *     tags={"Мероприятия"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Удалено"),
     *     @OA\Response(response="403", description="Нет прав")
     * )
     */
    public function destroy(Event $event)
    {
        $this->authorize('delete', $event);

        $this->service->deleteEvent($event);

        return response()->json(null, 204);
    }
}
