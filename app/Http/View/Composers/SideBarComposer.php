<?php

namespace App\Http\View\Composers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\View\View;

class SideBarComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();
        $postsWithoutCategoryCount = Post::doesntHave('categories')->count();

        $view->with([
            'categories' => $categories,
            'postsWithoutCategoryCount' => $postsWithoutCategoryCount,
        ]);
    }
}
