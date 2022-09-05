<?php

namespace App\Http\Controllers;
// Postの読み込み宣言
use App\Post;
// use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
// use Storage;

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

     // 追加したところ１
        $image = $request->file('image');
        // dd($image);
        $path = Storage::disk('s3')->putFile('larablogimg',$image,'public');
        $post ->image_path = Storage::disk('s3') -> url($path);
        
        $post->save();

        return redirect()->route('posts.index');
    }

    function show($id){
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    function edit($id){
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    function update(Request $request,$id){
        // dd($request);
        $post = Post::find($id);

        $post -> title = $request -> title;
        $post -> body = $request -> body;


        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('larablogimg',$image,'public');
        $post ->image_path = Storage::disk('s3') -> url($path);

        $post->save();
        return view('posts.show',compact('post'));
    }

    function destroy($id){
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }


}
