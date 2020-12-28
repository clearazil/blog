<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    <!-- Scripts
    ================================================== -->
    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script defer src="{{ asset('js/fontawesome/all.min.js') }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="site.webmanifest">

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- Header
    ================================================== -->
    <header class="s-header">

        <div class="row">

            <div class="s-header__content column">
                <h1 class="s-header__logotext">
                    @yield('header.title')
                </h1>
                <p class="s-header__tagline">Put your awesome tagline here.</p>
            </div>
            <div class="s-header__content">
                @if (Auth::check())
                    <h3 class="h6">{{ __('common.welcomeUser', ['name' => Auth::user()->name]) }}</h3>

                    @yield('sidebar.buttons')

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn--small">{{ __('common.logout') }}</button>
                    </form>
                @else
                    <h3 class="h6">{{ __('common.login') }}</h3>

                    <a class = "btn btn--small" href="{{ route('login') }}" title="">{{ __('common.login') }}</a>
                @endif
            </div>

        </div> <!-- end row -->

        <nav class="s-header__nav-wrap">

            <div class="row">

            @yield('menu')

        </nav> <!-- end #nav-wrap -->
    </header> <!-- Header End -->

    <!-- Content
    ================================================== -->
    <div class="s-content">

        <div class="row">

            @yield('main')

            @yield('sidebar')

        </div> <!-- end row -->

    </div> <!-- end content-wrap -->

    <!-- Footer
    ================================================== -->
    <footer class="s-footer">


        <div class="row s-footer__bottom">

            <div class="large-6 tab-full column s-footer__info">
                <h3 class="h6">About Keep It Simple</h3>

                <p>
                    Lorem ipsum Ullamco commodo laboris sit dolore commodo aliquip incididunt fugiat esse dolor
                    aute fugiat minim eiusmod do velit labore fugiat officia ad sit culpa labore in consectetur
                    sint cillum sint consectetur voluptate adipisicing Duis
                </p>

                <p>
                    Lorem ipsum Sed nulla deserunt voluptate elit occaecat culpa cupidatat sit irure sint
                    sint incididunt cupidatat esse in Ut sed commodo tempor consequat culpa fugiat incididunt.
                </p>
            </div>

            <div class="large-6 tab-full column">
                <div class="large-4 tab-full column">
                    <h3 class="h6">Navigate</h3>

                    @yield('footer.menu')
                </div>
            </div>

            <div class="ss-copyright">
                <span>© Copyright Keep It Simple 2019</span>
                <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
            </div>

        </div> <!-- end footer__bottom -->


        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M12 0l8 9h-6v15h-4v-15h-6z" /></svg>
            </a>
        </div> <!-- end ss-go-top -->

    </footer> <!-- end Footer-->


    <!-- Java Script
    ================================================== -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @routes
    @yield('scripts')

</body>

</html>
