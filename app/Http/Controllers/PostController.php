<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'lead' => 'required',
            'content' => 'required',
        ]);

        $post = new Post($data);
        $post->is_premium = $request->has('is_premium');
        $post->user_id = Auth::id();
        $post->save();

        return redirect(route('admin.post.show', ['post' => $post->id]));
    }
}
