@extends('layouts.app')

@section('content')

    <div id="main" class="s-content__main large-8 column">
        <h1 class="h-remove-top">{{ __('Reset Password') }}</h1>
        @if (session('status'))
            <div class="alert-box alert-box--success hideit">
                <p>{{ session('status') }}</p>
                <svg class="svg-inline--fa fa-times fa-w-11 alert-box__close" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <i class="fa fa-times alert-box__close" aria-hidden="true"></i> -->
            </div>
        @endif
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="warning" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="btn btn-primary">
                {{ __('Send Password Reset Link') }}
            </button>

        </form>
    </div> <!-- end main -->
@endsection
