<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'IndexController@index')->name('home');

/* Types */
Route::get('/types', 'DocumentTypeController@index')->name('types.index');
Route::post('/types', 'DocumentTypeController@getTypes')->name('types.get');
Route::get('/types/create', 'DocumentTypeController@create')->name('types.create');
Route::post('/types/store', 'DocumentTypeController@store')->name('types.store');
Route::get('/types/show/{id}', 'DocumentTypeController@show')->name('types.show');
Route::get('/types/edit/{id}', 'DocumentTypeController@edit')->name('types.edit');
Route::post('/types/update/{id}', 'DocumentTypeController@update')->name('types.update');
Route::post('/types/destroy/{id}', 'DocumentTypeController@destroy')->name('types.destroy');

/* Users */
Route::get('/users', 'UserController@index')->name('users.index');
Route::get('/users/create', 'UserController@create')->name('users.create');
Route::post('/users/store', 'UserController@store')->name('users.store');
Route::get('/users/show/{id}', 'UserController@show')->name('users.show');
Route::get('/users/edit/{id}', 'UserController@edit')->name('users.edit');
Route::post('/users/update/{id}', 'UserController@update')->name('users.update');
Route::post('/users/destroy/{id}', 'UserController@destroy')->name('users.destroy');
