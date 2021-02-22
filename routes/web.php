<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/posts', function () {
//     return view('posts.index');
// });

Route::get('/posts', 'PostController@index')->name('posts.index');
// /postというリクエストがGET送信できた時には、PostController.phpのindexメソッドを起動せよ！


// Route::get('/posts/create', function () {
//     return view('posts.create');
// });

Route::get('/posts/create', 'PostController@create')->name('posts.create');


Route::get('/posts/edit', function () {
    return view('posts.edit');
});


Route::get('/posts/show', function () {
    return view('posts.show');
});
