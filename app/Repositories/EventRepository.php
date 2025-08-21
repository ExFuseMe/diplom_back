<?php

namespace App\Repositories;
use App\Models\Event as Model;

class EventRepository extends CoreRepository
{
    public function getModelClass(): string
    {
        return Model::class;
    }

    public function listEvents()
    {
        return $this->startConditions()->all();
    }
}
