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

Route::group(['prefix' => 'admin'], function () {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::post('news/create', 'Admin\NewsController@create')->middleware('auth');
    Route::get('news', 'Admin\NewsController@index')->middleware('auth');
    Route::get('news/edit', 'Admin\NewsController@edit')->middleware('auth');
    Route::post('news/edit', 'Admin\NewsController@update')->middleware('auth');
    Route::get('news/delete', 'Admin\NewsController@delete')->middleware('auth');
});

Auth::routes();

Route::post('favorite/{id}/create', 'FavoriteController@create')->middleware('auth');
Route::post('favorite/{id}/delete', 'FavoriteController@delete')->middleware('auth');
Route::get('favorite/{id}/index', 'FavoriteController@index')->middleware('auth');

Route::resource('users', 'UserController');
Route::post('users/edit', 'UserController@update')->middleware('auth');;

Route::get('/', 'HomeController@index');
Route::get('news/index', 'NewsController@index');
Route::get('news/create', 'NewsController@add');
Route::post('news/create', 'NewsController@create')->middleware('auth');
Route::get('news/delete', 'NewsController@delete')->middleware('auth');
