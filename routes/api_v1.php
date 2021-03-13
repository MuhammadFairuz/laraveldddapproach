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
        Route::post('/', 'UserController@store');
    }
);
