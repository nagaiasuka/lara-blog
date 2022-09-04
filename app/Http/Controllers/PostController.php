<?php

namespace App\Http\Controllers;
// Postの読み込み宣言
use App\Post;
// use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index(){
        // データベースからデータの取り出し
        $posts = Post::all();
        // dd($posts);
        return view('posts.index',compact('posts'));
    }

    function create(){
        return view('posts.create');
    }

    function store(Request $request){
        // dd($request);
        $post = new Post;
        $post -> title = $request -> title;
        $post -> body = $request -> body;
        $post -> user_id = Auth::id();

        $post->save();
        return redirect()->route('index');
    }

    function show($id){
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }
}
