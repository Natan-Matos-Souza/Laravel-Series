<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use HasUuids, HasApiTokens;
    protected $table = 'users';

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

    public $timestamps = false;

    use HasFactory;


    public function newUniqueId(): string
    {
        return Uuid::uuid4();
    }

    public function uniqueIds(): array
    {
        return ['user_id'];
    }

}
