<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;

class DebugController extends Controller
{
    public function debug(Authenticatable $user)
    {
        dd($user->tokenCan('series:delete'));
    }
}
