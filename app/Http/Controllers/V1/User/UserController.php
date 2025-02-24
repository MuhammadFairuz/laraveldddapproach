<?php

namespace App\Http\Controllers\V1\User;

use App\Domain\User\Application\UserGetApplication;
use App\Domain\User\Application\UserStoringApplication;
use App\Exceptions\ErrorPredicted;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\CreateUserRequest;
use App\Http\Resources\V1\User\UserItem;
use App\Http\Resources\V1\User\UserPagination;
use Illuminate\Http\Request;
use Exception;
use stdClass;

class UserController extends Controller
{
    public function index(Request $request, UserGetApplication $userGetApplication)
    {
        $search = $request->search ?? "";
        $pagination = $request->pagination == "true" || $request->pagination == "1";
        $page = $request->page ?? 1;
        $limit = $request->limit ?? 15;
        $users = $userGetApplication->userGetList($search, $pagination, $page, $limit);

        if ($pagination) {
            $res = (new UserPagination($users));
            return respApiJsonSuccess($res);
        } else {
            $res = UserItem::collection($users);
            return respApiJsonSuccess($res, true);
        }
    }

    public function store(CreateUserRequest $request, UserStoringApplication $userStoringApplication, UserGetApplication $userGetApplication)
    {
        $id = $userStoringApplication->userStore($request);
        $user = $userGetApplication->userGetDetail($id);
        $res = (new UserItem($user));
        return respApiJsonSuccess($res);
    }

    public function show(UserGetApplication $userGetApplication, $id)
    {
        $user = $userGetApplication->userGetDetail($id);
        $res = (new UserItem($user));
        return respApiJsonSuccess($res);
    }

    public function update(CreateUserRequest $request, UserStoringApplication $userStoringApplication, UserGetApplication $userGetApplication, $id)
    {
        $id = $userStoringApplication->userUpdate($request);
        $user = $userGetApplication->userGetDetail($id);
        $res = (new UserItem($user));
        return respApiJsonSuccess($res);
    }

    public function delete(UserStoringApplication $userStoringApplication, $id)
    {
        $userStoringApplication->userDelete($id);
        return respApiJsonSuccess('Success Delete Data');
    }
}
