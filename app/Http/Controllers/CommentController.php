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
        // R: i.p.v. de foreign key te updaten kun je gebruikmaken van de Eloquent relation $post->comments()->save...
        // zie: https://laravel.com/docs/8.x/eloquent-relationships#inserting-and-updating-related-models
        $comment->post_id = $post->id;
        $comment->save();

        return redirect(route('post.show', ['post' => $post->id]) . '#comments');
    }
}
