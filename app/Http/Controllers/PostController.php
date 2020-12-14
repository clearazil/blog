<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $posts = Post::where([
            'user_id' => Auth::id(),
        ])->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.post.index', [
            'posts' => $posts,
        ]);
    }

    public function adminShow(Post $post, Request $request)
    {
        if ($request->user()->cannot('view', $post)) {
            abort(403);
        }

        return view('admin.post.show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.post.create', [
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->validatePost($request);

        $post = new Post($data);
        $post->user_id = Auth::id();

        if ($request->file('image') !== null) {
            $post->image = $request->file('image')->store('/public/images/posts');
        }

        $post->save();

        $post->categories()->attach($request->get('categories'));

        return redirect(route('admin.post.show', ['post' => $post->id]));
    }

    public function edit(Post $post, Request $request)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        $categories = Category::all();

        return view('admin.post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    public function update(Post $post, Request $request)
    {
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        $data = $this->validatePost($request);

        $post->fill($data);
        if ($request->file('image') !== null) {
            if ($post->image !== null) {
                Storage::delete(($post->image));
            }

            $post->image = $request->file('image')->store('/public/images/posts');
        }
        $post->save();
        $post->categories()->sync($request->get('categories'));

        return redirect(route('admin.post.show', ['post' => $post->id]));
    }

    public function delete(Post $post, Request $request)
    {
        if ($request->user()->cannot('view', $post)) {
            abort(403);
        }

        if ($post->delete()) {
            if ($post->image !== null) {
                Storage::delete(($post->image));
            }

            $messageStatus = 'success';
            $request->session()->flash('message', 'Artikel verwijderd.');
        } else {
            $messageStatus = 'error';
            $request->session()->flash('message', 'Er is een fout opgetreden bij het verwijderen van het artikel.');
        }

        $request->session()->flash('message-status', $messageStatus);

        return redirect(route('admin.post.index'));
    }

    public function validatePost(Request $request)
    {
        return $request->validate([
            'title' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,bmp|max:5000',
            'lead' => 'required',
            'content' => 'required',
            'is_premium' => 'required|bool',
            'categories' => 'exists:categories,id',
        ]);
    }
}
