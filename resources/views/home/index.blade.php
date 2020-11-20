@extends('layouts.app')

@section('content')

    <div id="main" class="s-content__main large-8 column">
        @forelse ($posts as $post)
            <article class="entry">

                <header class="entry__header">

                    <h2 class="entry__title h1">
                        <a href="{{ route('post.show', ['post' => $post->id]) }}" title="">{{ $post->title }}</a>
                    </h2>

                    <div class="entry__meta">
                        <ul>
                            <li>{{ $post->created_at->isoformat('LL') }}</li>
                            <li><a href="#" title="" rel="category tag">Ghost</a></li>
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
    </div> <!-- end main -->

@endsection
