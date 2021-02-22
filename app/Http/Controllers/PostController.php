<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルを使うための準備
// postモデルを使うための準備＝postsテーブルにアクセスするための準備
use App\post;

class PostController extends Controller
{
    //
    // ここにモデルへアクセスして、データをとってきたり、データを作ったり、更新したり、編集・削除する
    // つまり、ここでCRUD処理を発行する
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', ['posts' => $posts]);
        // 一覧機能を作るためのメソッド！
        // DBにあるpostsデータをとってきて,postフォルダのindex.blade.phpにデータを渡す
    }

    public function create()
    {
        return view('posts.create');
    }

}
