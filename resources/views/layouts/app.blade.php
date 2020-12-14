@extends('layouts.shared.main')

@section('scripts')
<script src="{{ asset('js/app.js') }}"></script>
@endsection

@section('header.title')
    <a href="index.html" title="">{{ config('app.name', 'Laravel') }}</a>
@endsection

@section('menu')
    <div class="row">

        <ul class="s-header__nav">
            <li class="current"><a href="{{ route('home.index') }}">Home</a></li>
            @if (Auth::check())
                <li><a href="{{ route('user.profile.show') }}">Account</a></li>
            @endif
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
