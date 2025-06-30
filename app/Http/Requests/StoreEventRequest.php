<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'date_time' => ['required', 'date', 'after_or_equal:today'],
            'files' => ['nullable', 'array'],
            'files.*' => ['file', 'mimes:jpeg,jpg,png,mp4,webm,mov', 'max:2048'],
        ];
    }
}
