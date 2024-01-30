<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUsersRepository implements UsersRepository
{
    public function create(array $data): User
    {
       $user = User::create($data);

       return $user;
    }

    public function exists(string $email)
    {
        return User::query()->where('email', '=', $email)->count();
    }
}
