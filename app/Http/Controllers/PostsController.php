<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index(){
        $posts = \App\Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        $archives = \App\Post::archives();

        return view('posts.index', compact('posts'));
    }

    public function show($id){
        $post = \App\Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new \App\Post;
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = auth()->id();
        $post->save();
        return redirect('/');
    }
}
