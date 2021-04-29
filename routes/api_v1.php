<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// api/v1/users
Route::group(
    [
        'prefix' => 'users',
        'namespace' => 'V1\User',
        'middleware' => [
            'role-multilang'
        ]
    ],
    function () {
        Route::get('/', 'UserController@index');
        Route::get('/{id}', 'UserController@show');
        Route::post('/', 'UserController@store');
        Route::put('/{id}', 'UserController@update');
        Route::delete('/{id}', 'UserController@delete');
    }
);

// api/v1/authors
Route::group(
    [
        'prefix' => 'authors',
        'namespace' => 'V1\Author',
    ],
    function () {
        // Route List
        Route::get('/', 'AuthorController@index');
        Route::get('search/{keyword}', 'AuthorController@search'); 
        Route::get('detail/{id}', 'AuthorController@show');
        Route::post('create/', 'AuthorController@store');
        Route::put('update/{id}','AuthorController@update');
        Route::delete('delete/{id}', 'AuthorController@delete');
    }
);

// api/v1/books
Route::group(
    [
        'prefix' => 'books',
        'namespace' => 'V1\Book',
    ],
    function () {
        // Route List
        Route::get('/', 'BookController@index');
        Route::get('search/{keyword}', 'BookController@search');
        Route::get('detail/{id}', 'BookController@show');
        Route::post('create/', 'BookController@store');
        Route::put('update/{id}', 'BookController@update');
        Route::delete('delete/{id}', 'BookController@delete');
    }
);