@extends('layouts.shared.main')

@section('header.title')
    <a href="index.html" title="">Administratie</a>
@endsection

@section('menu')
    <div class="row">

        <ul class="s-header__nav">
            <li class="current"><a href="{{ route('admin.post.index') }}">Artikelen</a></li>
        </ul> <!-- end #nav -->

    </div>
@endsection

@section('main')
    <div id="main" class="s-content__main large-12 column">
        @yield('content')
    </div> <!-- end main -->
@endsection

@section('sidebar.buttons')
    <a class="btn btn--primary btn--small" href="{{ route('home.index') }}">Blog</a>
@endsection
