<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルを使うための準備
// postモデルを使うための準備＝postsテーブルにアクセスするための準備
// require_once的なもの
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

    public function store(Request $request)
    {
        // PHPでの流れ
        // スーパーグローバル変数に格納されたデータを受け取る
        // 受け取ったデータをDBへ保存する

        // Laravelでの流れ
        // $requestがスーパーグローバル変数にあたる

        // Postクラスであり、modelクラスである→モデル＝DBと考えて良い
        $post = new Post;
        // 左辺がDB（カラム）   右辺がフォームの中身（name属性）
        $post -> title = $request->title;
        $post -> body = $request->body;
        $post ->user_id = 1;

        $post -> save();

        // リダイレクト処理
        return redirect()->route('posts.index');
    }

    // web.phpのRouteの{$post} = $idとなる
    public function show($id)
    {
        // 送られてきたidでDB検索、該当のデータを抽出
        $post = Post::find($id);
        return view('posts.show', ['post'=>$post]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', ['post'=>$post]);
    }

                                     // ↓２つのパラメータを受け取っている
                                     // Missing required parametorがでたらこれがあるかをチェック
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post -> title = $request->title;
        $post -> body = $request->body;
        $post ->user_id = 1;

        $post -> save();

        return view('posts.show', compact('post'));

        // ['post'=>$post]とcompact('post')は同義
    }

}
