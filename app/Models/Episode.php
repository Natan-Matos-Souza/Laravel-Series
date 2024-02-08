<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $table = 'episodes';
    protected $primaryKey = 'episode_id';
    protected $fillable = [
        'episode_number'
    ];
    public $timestamps = false;

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id');
    }
}
