@extends('layouts.app')

@section('content')

    <div id="main" class="s-content__main large-8 column">
        <h1 class="h-remove-top">{{ __('Login') }}</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="warning" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">

            @error('password')
                <span class="warning" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label class="h-add-bottom" for="remember">
                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="label-text">{{ __('Remember Me') }}</span>
            </label>

            <button type="submit" class="btn btn-primary">
                {{ __('Login') }}
            </button>

            @if (Route::has('password.request'))
                <a class="btn" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </form>
    </div> <!-- end main -->

@endsection
