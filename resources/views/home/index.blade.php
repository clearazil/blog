@extends('layouts.app')

@section('content')

    @forelse ($posts as $post)
        <article class="entry">

            <header class="entry__header">

                <h2 class="entry__title h1">
                    <a href="{{ route('post.show', ['post' => $post->id]) }}" title="">{{ $post->title }}</a>
                </h2>

                <div class="entry__meta">
                    <ul>
                        <li>{{ $post->created_at->isoformat('LL') }}</li>
                        <li>
                            @foreach($post->categories as $key => $category)
                                <a href="{{ route('home.index', ['categoryId' => $category->id]) }}" title="" rel="category tag">
                                    {{ $category->name . ($key !== $post->categories->keys()->last() ? ', ' : '') }}
                                </a>
                            @endforeach
                        </li>
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

@endsection
