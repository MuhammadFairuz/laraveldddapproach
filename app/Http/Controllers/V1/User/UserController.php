<?php

namespace App\Http\Controllers\V1\User;

use App\Domain\User\Application\UserGetApplication;
use App\Domain\User\Application\UserStoringApplication;
use App\Exceptions\ErrorPredicted;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\CreateUserRequest;
use App\Http\Resources\V1\User\UserItem;
use App\Http\Resources\V1\User\UserPagination;
use Exception;
use stdClass;

class UserController extends Controller
{
    public function index()
    {
        // TODO
    }

    public function store(CreateUserRequest $request, UserStoringApplication $userStoringApplication, UserGetApplication $userGetApplication)
    {
        $id = $userStoringApplication->userStore($request);
        $user = $userGetApplication->userGetDetail($id);
        $res = (new UserItem($user));
        return respApiJsonSuccess($res);
    }
}
