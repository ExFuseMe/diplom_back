<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EventForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_manager',
        'event_id',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public function fields(): HasMany
    {
        return $this->hasMany(FormField::class);
    }

    public function addField(array $field): void
    {
        $name = $field['name'];
        $type = $field['type'];
        $is_required = array_key_exists('is_required', $field) ? $field['is_required'] : false;
        $this->fields()->create([
            'name' => $name,
            'type' => $type,
            'is_required' => $is_required
        ]);
    }
}
