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

// 一覧表示をするためのルーティング
Route::get('/posts', 'PostController@index')->name('posts.index');
// /postというリクエストがGET送信できた時には、PostController.phpのindexメソッドを起動せよ！

// Route::get('/posts/create', function () {
//     return view('posts.create');
// });

// Create機能の作り方：下の２つを記載する
// １つ目：create.blade.phpの見た目を表示するためのルーティング
Route::get('/posts/create', 'PostController@create')->name('posts.create');

// ２つ目：保存処理をするためのルーティング
Route::post('/posts', 'PostController@store')->name('posts.store');
// name()メソッド → → ルーティングに名前付けをしている
// /postsのpost送信の別名はposts.storeである

// ３つ目：詳細画面を開くためのルーティング
Route::get('/posts/{post}', 'PostController@show')->name('posts.show');

// ４つ目：削除機能のためのルーティング
Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');

// ５つ目：編集機能のためのルーティング
Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');

// ６つ目：更新処理のためのルーティング
Route::put('/posts/{post}', 'PostController@update')->name('posts.update');
