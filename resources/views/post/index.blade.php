@extends('layouts.app')

@section('content')

    <section class="page-content">

        <h2 class="page-content__title h1">Artikelen</h2>

        <p class="lead">
        Lorem ipsum Nisi enim est proident est magna occaecat dolore
        proident eu ex sunt consectetur consectetur dolore enim nisi exercitation
        adipisicing magna culpa commodo deserunt ut do Ut occaecat. Lorem ipsum Veniam
        consequat quis.
        </p>

        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('post.show', ['post' => $post->id]) }}">{{ $post->title }}</a></li>
            @endforeach
        </ul>

        {{ $posts->links() }}

    </section> <!-- end page -->

@endsection

