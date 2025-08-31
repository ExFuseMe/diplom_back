<?php

namespace App\Repositories;

use App\Models\EventForm;

class EventFormRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return EventForm::class;
    }


    public function getListByEventId(int $eventId)
    {
        return $this->startConditions()
            ->where('event_id', $eventId)
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
