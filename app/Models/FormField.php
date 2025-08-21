<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model
{
    protected $fillable = [
        'name',
        'type',
        'is_required',
        'event_forms_id'
    ];

    public function eventForm(): BelongsTo
    {
        return $this->belongsTo(EventForm::class, 'event_forms_id');
    }
}
