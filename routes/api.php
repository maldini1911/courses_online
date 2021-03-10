<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//==> Start Users
Route::get('users', 'Api\Users@getUsers');
Route::post('create/user', 'Api\Users@store');
Route::put('update/user/{id}', 'Api\Users@update');
Route::delete('delete/user/{id}', 'Api\Users@delete');
//==> End Users

//==> Start Categories
Route::get('categories', 'Api\Categories@getCats');
Route::post('create/category', 'Api\Categories@store');
Route::put('update/category/{id}', 'Api\Categories@update');
Route::delete('delete/category/{id}', 'Api\Categories@delete');
//==> End Categories
