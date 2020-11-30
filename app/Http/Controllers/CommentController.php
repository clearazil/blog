<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $comment = new Comment($data);
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('post.show', ['post' => $post->id]) . '#comments');
    }
}
