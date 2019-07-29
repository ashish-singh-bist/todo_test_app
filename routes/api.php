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

Route::get('tasks','Api\TaskController@getAll');
Route::post('task/create','Api\TaskController@store');
Route::put('task/update/{id}','Api\TaskController@update');
Route::delete('task/delete/{id}','Api\TaskController@delete');