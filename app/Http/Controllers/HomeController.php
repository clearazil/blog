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

        $posts = Post::select('*');

        if ($request->has('categoryId')) {
            $posts->whereHas('categories', function (Builder $query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            });
        }

        if ($request->has('uncategorized')) {
            $posts->whereDoesntHave('categories');
        }

        $posts->orderBy('created_at', 'desc');

        $view = 'home.index';

        if ($request->ajax()) {
            $view = 'home.partials.posts';
        }

        return view($view, [
            'posts' => $posts->paginate(4)->appends($request->except(('page'))),
        ]);
    }
}
