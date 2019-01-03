<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
        ]);

        $post = Post::findOrFail($post_id);
        $post->comments()->create($params);

        return redirect()->route('posts.show',['post' => $post]);
    }
    }
}