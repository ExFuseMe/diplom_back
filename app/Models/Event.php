<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Filterable, InteractsWithMedia;

    protected $fillable = ['name', 'description', 'address', 'date_time'];

    protected function casts(): array
    {
        return [
            'date_time' => 'datetime'
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('event_files');
    }
}
