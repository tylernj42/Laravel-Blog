<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(\App\Post $post){
        $this->validate(request(), ['body' => 'required|min:2']);
        $post->addComment(request('body'));
        return back();
    }
}
