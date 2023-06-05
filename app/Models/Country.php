<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function scopeSortByField(object $query, string $field, string $direction = 'asc'): QueryBuilder
    {
        $sortableFields = ['name', 'recovered', 'deaths', 'confirmed'];
        if (!in_array($field, $sortableFields)) {
            return $query;
        }

        return $query->orderBy($field, $direction);
    }

}
