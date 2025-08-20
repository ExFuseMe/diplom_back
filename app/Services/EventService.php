<?php

namespace App\Services;

use App\Models\Event;
use App\Repositories\EventRepository;
use Carbon\Carbon;

class EventService
{
    private EventRepository $repo;

    public function __construct()
    {
        $this->repo = new EventRepository;
    }

    public function listEvents(): array
    {
        $events = $this->repo->listEvents();

        $groupedEvents = $events->groupBy(function ($val) {
            return Carbon::parse($val->created_at)->format('M');
        });

        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $monthsMap = [
            'Jan' => 'Янв',
            'Feb' => 'Фев',
            'Mar' => 'Мар',
            'Apr' => 'Апр',
            'May' => 'Май',
            'Jun' => 'Июн',
            'Jul' => 'Июл',
            'Aug' => 'Авг',
            'Sep' => 'Сен',
            'Oct' => 'Окт',
            'Nov' => 'Ноя',
            'Dec' => 'Дек'
        ];

        $labels = [];
        $data = [];

        foreach ($months as $m) {
            $labels[] = $monthsMap[$m];
            $data[] = $groupedEvents->has($m) ? $groupedEvents[$m]->count() : 0;
        }
        $monthEvents = $events->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();

        return [$events, $labels, $data, $monthEvents];
    }

    public function createEvent(array $validated)
    {
        return Event::create($validated);
    }
}
