<?php

namespace App\Http\Requests;

use App\Rules\EventFormFieldTypeRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEventFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'event_id' => ['required', 'exists:events,id'],
            'is_manager' => ['nullable', 'boolean'],
            'fields' => ['required', 'array'],
            'fields.*.name' => ['required', 'string'],
            'fields.*.type' => ['required', 'string', new EventFormFieldTypeRule()],
            'fields.*.is_required' => ['nullable', 'boolean'],
        ];
    }
}
