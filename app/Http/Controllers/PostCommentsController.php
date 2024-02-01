<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;


class PostCommentsController extends Controller
{
    //

    public function store(Post $post, Request  $request) {
        // dd(request('body'));
        //validate
        $this->validate($request ,[
            'body'  => 'required'
        ]);

        //create and save comment
        $post->comments()->create(
            [
                'user_id' => $post->user_id,//request()->user()->id
                'body' => $request->body//request('body') o  $request->input('body')
            ]
        );

        // return back
        return back();
    }
}
