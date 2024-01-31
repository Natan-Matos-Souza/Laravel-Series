<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController
{
    public function index(Request $request)
    {

        $redirect = $request->get('page');
        return view('login.index', [
            'redirect' => $redirect
        ]);
    }

    public function store(LoginRequestForm $request)
    {

        $userCredentials = $request->only(['email', 'password']);

        if (!Auth::attempt($userCredentials)) return to_route('login')
            ->withErrors('Usuário ou senha inválidos!');

        return $request->redirect ? redirect($request->redirect) : to_route('series.index');
    }
}
