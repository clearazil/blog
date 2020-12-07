
    @forelse ($posts as $post)
    <article class="entry">

        <header class="entry__header">

            <h2 class="entry__title h1">
                <a href="{{ route('post.show', ['post' => $post->id]) }}" title="">{{ $post->title }}</a>
            </h2>

            <div class="entry__meta">
                <ul>
                    <li>{{ $post->created_at->isoformat('LL') }}</li>
                    @if ($post->categories->isNotEmpty())
                        <li>
                            @foreach($post->categories as $key => $category)
                                <a href="{{ route('home.index', ['categoryId' => $category->id]) }}" title="" rel="category tag">
                                    {{ $category->name . (!$loop->last ? ', ' : '') }}
                                </a>
                            @endforeach
                        </li>
                    @endif
                    <li>{{ $post->user->name }}</li>
                </ul>
            </div>

        </header>

        <div class="entry__content">
            <p>{!! nl2br(e($post->lead)) !!}</p>
        </div>

    </article> <!-- end entry -->
@empty
    <p>No posts yet.</p>
@endforelse

{{ $posts->links() }}

