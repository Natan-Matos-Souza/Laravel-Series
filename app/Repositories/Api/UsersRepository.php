<?php

namespace App\Repositories\Api;

use App\Models\User;

interface UsersRepository
{
    public function findUser(string $email);

    public function create(object $data);
}
