<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventFormRequest;
use App\Http\Requests\UpdateEventFormRequest;
use App\Models\EventForm;
use App\Services\EventFormService;

class EventFormController extends Controller
{
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventFormRequest $request, EventFormService $eventFormService)
    {
        $validated = $request->validated();
        $form = $eventFormService->createEventFormWithFields($validated);
        dd($form);
    }

    /**
     * Display the specified resource.
     */
    public function show(EventForm $eventForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventForm $eventForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventFormRequest $request, EventForm $eventForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventForm $eventForm)
    {
        //
    }
}
