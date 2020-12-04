<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the index page
     */
    public function index(Request $request)
    {
        $categoryId = $request->query('categoryId');

        if (!empty($category)) {
            $category = Category::find($categoryId);
            $posts = $category->posts;
        } else {
            $posts = Post::orderBy('created_at', 'desc');
        }

        return view('home.index', [
            'posts' => $posts->paginate(4),
        ]);
    }
}
