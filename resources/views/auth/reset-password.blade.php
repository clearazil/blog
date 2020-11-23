@extends('layouts.app')

@section('content')

    <div id="main" class="s-content__main large-8 column">
        <h1 class="h-remove-top">{{ __('Reset Password') }}</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ request()->route('token') }}">

            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" name="email" value="{{ request()->get('email') ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="warning" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">

            @error('password')
                <span class="warning" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

            <button type="submit" class="btn btn-primary">
                {{ __('Reset Password') }}
            </button>

        </form>
    </div> <!-- end main -->

@endsection
