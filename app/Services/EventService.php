<?php

namespace App\Services;

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
}
