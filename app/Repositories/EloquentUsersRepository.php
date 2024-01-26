<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUsersRepository implements UsersRepository
{
    public function create(object $data): User
    {
       $user = User::create([
            'email'     => $data->email,
            'password'  => $data->password
        ]);

       return $user;
    }

    public function exists(string $email)
    {
        return User::query()->where('email', '=', $email)->count();
    }
}
