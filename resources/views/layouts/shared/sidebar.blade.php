<div id="sidebar" class="s-content__sidebar large-4 column">

    <div class="widget widget--categories">
        <h3 class="h6">{{ __('common.categories') }}</h3>
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a class="category-link" category-id={{ $category->id }} href="{{ route('home.index', ['categoryId' => $category->id]) }}" title="">
                        {{ $category->name }}
                    </a> ({{ $category->posts->count() }})
                </li>
            @endforeach

            @if (!empty($postsWithoutCategoryCount))
                <li><a id="posts-without-category-link" href="{{ route('home.index', ['uncategorized' => 1]) }}" title="">{{ __('categories.uncategorized') }}</a> ({{ $postsWithoutCategoryCount }})</li>
            @endif
        </ul>
    </div>

    <div class="widget widget_text group">
        <h3 class="h6">Widget Text</h3>

        <p>
            Lorem ipsum Ullamco commodo laboris sit dolore commodo aliquip incididunt fugiat esse dolor
            aute fugiat minim eiusmod do velit labore fugiat officia ad sit culpa labore in consectetur
            sint cillum sint consectetur voluptate adipisicing Duis irure magna ut sit amet reprehenderit.
        </p>
    </div>





</div> <!-- end sidebar -->
