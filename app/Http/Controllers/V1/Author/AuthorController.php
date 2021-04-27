<?php

namespace App\Http\Controllers\V1\Author;

use App\Domain\Author\Application\AuthorGetApplication;
use App\Domain\Author\Application\AuthorStoringApplication;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\Author\AuthorItem;
use Illuminate\Http\Request;
use App\Http\Requests\V1\Author\CreateAuthorRequest;
use App\Http\Requests\V1\Author\UpdateAuthorRequest;
use App\Http\Requests\V1\User\CreateAuthorRequest as UserCreateAuthorRequest;

class AuthorController extends Controller
{
    //View List Author

    public function index(AuthorGetApplication $authorGetApplication)
    {
        $author = $authorGetApplication->authorGetList();
        $res = AuthorItem::collection($author);
        return respApiJsonSuccess($res, false);
    }

    //Search Author
    public function search(Request $request, AuthorGetApplication $authorGetApplication)
    {
        $keyword = $request->keyword ?? "";
        $author = $authorGetApplication->authorGetListWithOption($keyword);
        $res = AuthorItem::collection($author);
        return respApiJsonSuccess($res, true);
    }
    
    //View Detail Author
    public function show(AuthorGetApplication $authorGetApplication, $id)
    {
        $author = $authorGetApplication->authorGetDetail($id);
        $res = (new AuthorItem($author));
        return respApiJsonSuccess($res, false);
    }

    //Store Data Author
    public function store(CreateAuthorRequest $request, AuthorStoringApplication $authorStoringApplication, AuthorGetApplication $authorGetApplication)
    {
        $id = $authorStoringApplication->authorStore($request);
        $author = $authorGetApplication->authorGetDetail($id);
        $res = (new AuthorItem($author));
        return respApiJsonSuccess($res);
    }

    //Update Data Author
    public function update(UpdateAuthorRequest $request, AuthorStoringApplication $authorStoringApplication, AuthorGetApplication $authorGetApplication, $id)
    {
        $id = $authorStoringApplication->authorUpdate($id, $request);
        $author = $authorGetApplication->authorGetDetail($id);
        $res = (new AuthorItem($author));
        return respApiJsonSuccess($res);
    }

    //Delete Data Author
    public function delete(AuthorStoringApplication $authorStoringApplication, $id)
    {
        $authorStoringApplication->authorDelete($id);
        return respApiJsonSuccess('Success Delete');
    }
}
