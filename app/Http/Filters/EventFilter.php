<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class EventFilter extends AbstractFilter
{
    public const ID = 'id';
    public const NAME = 'name';
    public const DESCRIPTION = 'description';
    public const ADDRESS = 'address';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::NAME => [$this, 'name'],
            self::DESCRIPTION => [$this, 'description'],
            self::ADDRESS => [$this, 'address'],
        ];
    }

    public function id(Builder $builder, $value): void
    {
        $builder->where('id', 'like', "%{$value}%");
    }

    public function name(Builder $builder, $value): void
    {
        $builder->where('name', 'ilike', "%{$value}%");
    }

    public function description(Builder $builder, $value): void
    {
        $builder->where('description', 'ilike', "%{$value}%");
    }

    public function address(Builder $builder, $value): void
    {
        $builder->where('address', 'ilike', "%{$value}%");
    }
}
