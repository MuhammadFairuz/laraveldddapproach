<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([]);
    }

    public function store(CreateUserRequest $request)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        return respApiJsonSuccess([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
    }
}
