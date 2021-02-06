<?php

namespace App\Http\Controllers\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\CreateUserRequest;
use App\Http\Resources\V1\User\UserItem;
use App\Http\Resources\V1\User\UserPagination;

class UserController extends Controller
{
    public function index()
    {
        return response()->json([]);
    }

    public function store(CreateUserRequest $request)
    {
        $items = [
            (object) ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]), (object) ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]), (object) ([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ])
        ];

        $data = [
            'items' => collect($items),
            'total' => 10,
            'perPage' => 5,
            'currentPage' => 1,
            'totalPage' => 2
        ];

        $paginateData = (new UserPagination((object) ($data)));

        return respApiJsonSuccess($paginateData);
    }
}
