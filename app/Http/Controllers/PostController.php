<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post,
        ]);
    }

    public function adminIndex()
    {
        $posts = Post::paginate(10);

        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    public function adminShow(Post $post)
    {
        return view('admin.post.show', [
            'post' => $post,
        ]);
    }
}
