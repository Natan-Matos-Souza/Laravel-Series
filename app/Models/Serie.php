<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    use HasFactory;

    protected $table = "series";
    public $timestamps = false;

    protected $fillable = [
        'name',
        'coverPath'
    ];

    // protected $with = [
    //     'seasons'
    // ];

    public function seasons()
    {
        return $this->hasMany(Season::class, 'series_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('order', function(Builder $queryBuilder) {
            $queryBuilder->orderBy('name');
        });
    }
}
