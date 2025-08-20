<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Services\EventService;

class EventController extends Controller
{
    public function index(EventService $eventService)
    {
        //TODO: проверки

        [$events, $labels, $graphData, $monthEvents] = $eventService->listEvents();


        return view(
            'pages.events.index',
            ['events' => $events, 'graphData' => $graphData, 'labels' => $labels, 'monthEvents' => $monthEvents]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //TODO: проверка роли
        return view('pages.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request, EventService $eventService)
    {
        //TODO: проверка роли
        $validated = $request->validated();
        $event = $eventService->createEvent($validated);

        return redirect()->route('events.show', ['event' => $event]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        dd($event);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
    }
}
