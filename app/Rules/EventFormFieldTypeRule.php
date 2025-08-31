<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Consts\FieldTypesEnum;

class EventFormFieldTypeRule implements ValidationRule
{
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!is_int(array_search($value, FieldTypesEnum::getAll()))) {
            $fail("Неизвестный тип поля: " . $value);
        }
    }
}
