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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update_avatar');

Route::get('/posts', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update')->middleware('can:update, post');
Route::delete('/posts/{post}', 'PostController@destroy');

Route::get('/users', 'UserController@index')->name('users.dashboard');

Route::get('/users/create', 'UserController@create');
Route::post('/users', 'UserController@store');

Route::get('/users/{user}', 'UserController@show')->middleware('can:view, user');
Route::get('/users/{user}/edit', 'UserController@edit');
Route::post('/users/{user}/attachRole', 'AdminDashboardController@attachRole')->name('attach.role');
Route::post('/users/{user}/detachRole', 'AdminDashboardController@detachRole')->name('detach.role');
Route::delete('/users/{user}', 'UserController@destroy');




