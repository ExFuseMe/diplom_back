<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'address' => ['nullable', 'string', 'max:255'],
            'date_time' => ['nullable', 'date', 'after_or_equal:today'],
            'files' => ['nullable', 'array'],
            'files.*' => ['file', 'mimes:jpeg,jpg,png,mp4,webm,mov', 'max:2048'],
        ];
    }
}
