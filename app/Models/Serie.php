<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $appends = [
        'links'
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

    public function links(): Attribute
    {
        return new Attribute(
            get: fn () => [
                [
                    'rel'   => 'self',
                    'url'   => "/api/series/{$this->id}"
                ],

                [
                    'rel'   => 'seasons',
                    'url'   => "/api/seasons/{$this->id}"
                ],

                [
                    'rel'   => 'episodes',
                    'url'   => "/api/episodes/{$this->id}"
                ]
            ]
        );
    }
}
