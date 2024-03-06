<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {

        if (!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->noContent(401);
        }


        $user = Auth::user();
        $userTokens = $user->tokens()->get();
        if ($userTokens->count() >= 3)
        {
            $userTokens->first()->delete();
        }

        $token = $user->createToken($request->ip(), ['series:create'], now()->addMinutes());

        return response()->json([
            'token' => $token->plainTextToken
        ]);

    }
}
