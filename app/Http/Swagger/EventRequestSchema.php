<?php

namespace App\Http\Swagger;

/**
 * @OA\Schema (required={"name", "description", "address", "date_time"})
 */
class EventRequestSchema
{
    /**
     * @OA\Property (example="Название мероприятия")
     */
    public string $name;

    /**
     * @OA\Property (example="Описание мероприятия")
     */
    public string $description;

    /**
     * @OA\Property (example="г. Казань, ул. Пушкина, 1")
     */
    public string $address;

    /**
     * @OA\Property (example="2024-07-01T18:00:00+03:00")
     */
    public string $date_time;
} 