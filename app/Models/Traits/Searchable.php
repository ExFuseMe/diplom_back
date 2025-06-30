<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Searchable
{
    public function scopeSearch(Builder $query, string $search): Builder
    {
        $query->where(function ($query) use ($search) {
            foreach ($this->getSearchableFields() as $field) {
                $query->orWhere($field, 'ilike', "%{$search}%");
            }
        });

        return $query;
    }

    protected function getSearchableFields(): array
    {
        if (isset($this->searchableFields) && count($this->searchableFields)) {
            return $this->searchableFields[0] === '*'
                ? $this->getAllModelTableFields()
                : $this->searchableFields;
        }

        return $this->getAllModelTableFields();
    }

    protected function getAllModelTableFields(): array
    {
        $tableName = $this->getTable();

        return $this->getConnection()
            ->getSchemaBuilder()
            ->getColumnListing($tableName);
    }
}
