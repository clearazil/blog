<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the index page
     */
    public function index(Request $request)
    {
        $categoryId = $request->query('categoryId');

        if (!empty($categoryId)) {
            $posts = Post::whereHas('categories', function (Builder $query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            })->orderBy('created_at', 'desc');
        } else {
            $posts = Post::orderBy('created_at', 'desc');
        }

        return view('home.index', [
            'posts' => $posts->paginate(4)->appends($request->except(('page'))),
        ]);
    }
}
