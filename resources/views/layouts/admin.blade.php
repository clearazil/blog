@extends('layouts.shared.main')

@section('header.title')
    <a href="{{ route('admin.post.index') }}" title="">{{ __('common.admin') }}</a>
@endsection

@section('menu')
    <div class="row">
        <ul class="s-header__nav">
            {{-- R: er wordt twee keer een 'Artikelen' tabblad weergegeven --}}
            <li class="{{ request()->is('admin/posts*') ? 'current' : '' }}"><a href="{{ route('admin.post.index') }}">{{ __('common.posts') }}</a></li>
            <li class="{{ request()->is('admin/categories*') ? 'current' : '' }}"><a href="{{ route('admin.category.index') }}">{{ __('common.categories') }}</a></li>
        </ul> <!-- end #nav -->

    </div>
@endsection

@section('main')
    <div id="main" class="s-content__main large-12 column">
        @yield('content')
    </div> <!-- end main -->
@endsection

@section('sidebar.buttons')
    <a class="btn btn--primary btn--small" href="{{ route('home.index') }}">{{ __('common.blog') }}</a>
@endsection

@section('footer.menu')
    <ul class="s-footer__list s-footer-list--nav group">
        <li><a href="{{ route('admin.post.index') }}">{{ __('common.posts') }}</a></li>
        <li><a href="{{ route('admin.category.index') }}">{{ __('common.categories') }}</a></li>
    </ul>
@endsection
