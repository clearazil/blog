@extends('layouts.shared.main')

@section('header.title')
    <a href="index.html" title="">{{ config('app.name', 'Laravel') }}</a>
@endsection

@section('menu')
    <div class="row">

        <ul class="s-header__nav">
            <li class="current"><a href="{{ route('home.index') }}">Home</a></li>
            <li class="has-children"><a href="#0">Dropdown</a>
                <ul>
                    <li><a href="#0">Submenu 01</a></li>
                    <li><a href="#0">Submenu 02</a></li>
                    <li><a href="#0">Submenu 03</a></li>
                </ul>
            </li>
            <li><a href="demo.html">Demo</a></li>
            <li><a href="archives.html">Archives</a></li>
            <li class="has-children"><a href="#0">Blog</a>
                <ul>
                    <li><a href="blog.html">Blog Entries</a></li>
                    <li><a href="single.html">Single Blog</a></li>
                </ul>
            </li>
            <li><a href="page.html">Page</a></li>
        </ul> <!-- end #nav -->

    </div>
@endsection

@section('main')
    <div id="main" class="s-content__main large-8 column">
        @yield('content')
    </div> <!-- end main -->
@endsection

@section('sidebar')
    @include('layouts.shared.sidebar')
@endsection

@section('sidebar.buttons')
    <a class="btn btn--primary btn--small" href="{{ route('admin.post.index') }}">Administratie</a>
@endsection
