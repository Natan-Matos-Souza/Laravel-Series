<?php

namespace App\Repositories\Api;

use App\Models\User;

class EloquentUsersRepository implements UsersRepository
{
    public function findUser(string $email): User|null
    {
        return User::query()->where('email', '=', $email)->first();
    }

    public function create(object $data): void
    {
        User::create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password
        ]);
    }
}
