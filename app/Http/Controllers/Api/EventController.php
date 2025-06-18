<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Resources\EventResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EventController extends Controller
{
    use AuthorizesRequests;

    /**
     * @OA\Get(
     *     path="/api/events",
     *     summary="Получить список мероприятий",
     *     tags={"Мероприятия"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="Успешно", @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/EventResponseSchema"))),
     * )
     */
    public function index()
    {
        $events = Event::all();
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
    public function store(Request $request)
    {
        $this->authorize('create', Event::class);
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'date_time' => 'required|date',
        ]);
        $event = Event::create($data);
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
    public function update(Request $request, Event $event)
    {
        $this->authorize('update', $event);
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'address' => 'required|string',
            'date_time' => 'required|date',
        ]);
        $event->update($data);
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
        $event->delete();
        return response()->json(null, 204);
    }
}
