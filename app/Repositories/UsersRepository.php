<?php

namespace App\Repositories;

interface UsersRepository
{
    public function create(array $data);

    public function exists(string $email);
}
