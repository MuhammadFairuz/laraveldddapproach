<?php

namespace App\Http\Controllers\V1\Book;

use App\Domain\Book\Application\BookGetApplication;
use App\Domain\Book\Application\BookStoringApplication;
use App\Http\Requests\V1\Book\CreateBookRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Book\UpdateBookRequest;
use App\Http\Resources\V1\Book\BookItem;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // View List Book
    public function index(BookGetApplication $bookGetApplication){
        $book = $bookGetApplication->bookGetList();
        $res = BookItem::collection($book);
        return respApiJsonSuccess($res, false);
    }

    // View Detail Book
    public function show(BookGetApplication $bookGetApplication, $id){
        $book = $bookGetApplication->bookGetDetail($id);
        $res = (new BookItem($book));
        return respApiJsonSuccess($res, false);
    }

    // Search Data Book
    public function search(Request $request, BookGetApplication $bookGetApplication){
        $keyword = $request->keyword ?? "";
        $book = $bookGetApplication->bookGetListWithOption($keyword);
        $res = BookItem::collection($book);
        return respApiJsonSuccess($res, false);
    }

    // Store Data Book
    public function store(CreateBookRequest $request, BookStoringApplication $bookStoringApplication, BookGetApplication $bookGetApplication)
    {
        $id = $bookStoringApplication->bookStore($request);
        $book = $bookGetApplication->bookGetDetail($id);
        $res = (new BookItem($book));
        return respApiJsonSuccess($res);
    }

    // Update Data Book
    public function update(UpdateBookRequest $request, BookStoringApplication $bookStoringApplication, BookGetApplication $bookGetApplication, $id)
    {
        $id = $bookStoringApplication->bookUpdate($request);
        $book = $bookGetApplication->bookGetDetail($id);
        $res = (new BookItem($book));
        return respApiJsonSuccess($res);
    }

    // Delete Data Book
    public function delete(BookStoringApplication $bookStoringApplication, $id)
    {
        $bookStoringApplication->bookDelete($id);
        return respApiJsonSuccess('Success Delete');
    }
}
