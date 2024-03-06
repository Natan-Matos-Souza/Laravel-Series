<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Api\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request, UsersRepository $repository): void
    {
        $requiredFields = ['name', 'email', 'password'];
        $data = $request->only($requiredFields);
        $data['password'] = Hash::make($data['password']);

        if (array_keys($data) === $requiredFields) $repository->create((object) $data);

    }

    public function destroy(User $users):void
    {
        $users->delete();
    }
}
