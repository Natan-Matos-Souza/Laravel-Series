<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Ramsey\Uuid\Uuid;

class User extends Authenticatable
{
    use HasUuids;
    protected $table = 'users';

    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password'
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
