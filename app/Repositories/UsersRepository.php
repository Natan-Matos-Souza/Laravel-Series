<?php

namespace App\Repositories;

interface UsersRepository
{
    public function create(object $data);

    public function exists(string $email);
}
