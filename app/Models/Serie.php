<?php

namespace App\Models;

use App\Http\Controllers\Api\SeasonsController;
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

    public function episodes()
    {
        $this->hasManyThrough(
            Episode::class,
            Season::class,
            'series_id',
            'season_id',
            'id',
            'season_id'
        );
    }
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
