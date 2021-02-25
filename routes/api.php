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

Route::post('/xx', 'UserController@xx');
Route::post('/users/list', 'UserController@apiIndex')->middleware('cors');
Route::post('/users/show', 'UserController@apiShow')->middleware('cors');

