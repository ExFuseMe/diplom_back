<?php

namespace App\Services;

use App\Models\Event;
use App\Models\EventForm;
use App\Repositories\EventFormRepository;
use Illuminate\Support\Facades\DB;

class EventFormService
{
    private EventFormRepository $repository;

    public function __construct()
    {
        $this->repository = new EventFormRepository();
    }

    public function getEventForms(int $eventId)
    {
        return $this->repository->getListByEventId($eventId);
    }

    public function createEventFormWithFields(array $validated)
    {
        DB::beginTransaction();
        try {
            $event = Event::find($validated['event_id']);
            $form = $event->forms()->create([
                'is_manager' => array_key_exists('is_manager', $validated) ? $validated['is_manager'] : false,
            ]);

            foreach ($validated['fields'] as $field) {
                $form->addField($field);
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return $form;
    }
}
