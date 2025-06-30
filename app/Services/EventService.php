<?php

namespace App\Services;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Repositories\EventRepository;

class EventService
{

    private EventRepository $repository;

    public function __construct()
    {
        $this->repository = new EventRepository();
    }

    public function getEventList(int $perPage = 10, array $filter = [])
    {
        return $this->repository->getEvents($perPage, array_filter($filter));
    }

    public function createEvent(StoreEventRequest $request): Event
    {
        $validated = $request->validated();
        return Event::create($validated);
    }

    public function updateEvent(UpdateEventRequest $request, Event $event): void
    {
        $validated = $request->validated();
        $event->update($validated);
    }

    public function deleteEvent(Event $event): void
    {
        $event->delete();
    }
}
