<?php

namespace App\Repositories;

use App\Http\Filters\EventFilter as Filter;
use App\Models\Event as Model;
class EventRepository extends CoreRepository
{

    protected function getModelClass(): string
    {
        return Model::class;
    }

    protected function getFields(): array
    {
        return [
            'id',
            'name',
            'description',
            'address',
            'date_time'
        ];
    }

    public function getEvents(int $perPage = 10, array $queryParams = [])
    {
        $filter = app()->make(Filter::class, ['queryParams' => $queryParams]);
        return $this->startConditions()
            ->select($this->getFields())
            ->filter($filter)
            ->paginate($perPage);
    }
}
