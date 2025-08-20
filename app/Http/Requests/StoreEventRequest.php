<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'date' => ['required', 'date', 'after_or_equal:now'],
            'address' => ['required', 'string'],
        ];
    }
}
