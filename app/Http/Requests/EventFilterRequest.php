<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventFilterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
        ];
    }
}
