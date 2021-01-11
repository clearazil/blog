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

        // R: onderstaande driedelige if-statement kan vervangen worden door 1 Eloquent query die alle posts selecteert. Vervolgens kun je met
        // 1 if-statement controleren of er een category-id is geset met de $request->has() functie. Is dit het geval, dan kun je de query uit de vorige
        // stap hergebruiken en van extra category-id filter voorzien. Als laatste stap pas je de paginate toe. Op deze wijze kun je meerdere filters combineren
        // voor 1 resultaten set
        if (!empty($categoryId)) {
            $posts = Post::whereHas('categories', function (Builder $query) use ($categoryId) {
                $query->where('categories.id', $categoryId);
            })->orderBy('created_at', 'desc');
        } elseif (!empty($request->query('uncategorized'))) {
            $posts = Post::whereDoesntHave('categories')
                ->orderBy('created_at', 'desc');
        } else {
            $posts = Post::orderBy('created_at', 'desc');
        }

        $view = 'home.index';

        if ($request->ajax()) {
            $view = 'home.partials.posts';
        }

        return view($view, [
            'posts' => $posts->paginate(4)->appends($request->except(('page'))),
        ]);
    }
}
