<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;

class TestController extends Controller
{
    public function test(Request $request): void
    {
        $user = $request->user();
        $user->tokens()->delete();


        dd($user);
    }
}
