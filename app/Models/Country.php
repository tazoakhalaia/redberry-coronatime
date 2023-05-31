<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function scopeSortByField($query, $field, $direction = 'asc') : Builder
{
    $sortableFields = ['name', 'recovered', 'deaths', 'confirmed'];
    if (!in_array($field, $sortableFields)) {
        return $query;
    }
    
    return $query->orderBy($field, $direction);
}

}
