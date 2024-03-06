<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';
    protected $primaryKey = 'episode_id';
    protected $casts = [
        'watched'   =>  'bool'
    ];
    protected $fillable = [
        'episode_number',
        'watched'
    ];
    public $timestamps = false;

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class, 'season_id');
    }

    protected function watched(): Attribute
    {
        return new Attribute(
            get: fn ($watched) => (bool) $watched,
            set: fn ($data) => (bool) $data
        );
    }
}
