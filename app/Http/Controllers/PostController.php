<?php

namespace App\Http\Controllers;
// Postの読み込み宣言
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        // データベースからデータの取り出し
        $posts = Post::all();
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    function create(){
        return view('posts.create');
    }
}
