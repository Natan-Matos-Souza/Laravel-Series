<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterForm;
use App\Repositories\UsersRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRegisterForm $request, UsersRepository $repository)
    {

        if ($repository->exists($request->get('email'))) return to_route('login')
            ->withErrors('Email já cadastrado!');

        $password = $request->get('password');

        $password = password_hash($password, PASSWORD_BCRYPT);

        $data = (object) [
            'email'     => $request->get('email'),
            'password'  => $password
        ];

        $user = $repository->create($data);

        Auth::login($user);

        return to_route('series.index')
            ->with('message.success', 'Bem-vindo!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
