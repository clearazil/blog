@extends('layouts.app')

@section('content')

    <h4 class="h-remove-top">{{ __('Subscribe to premium content') }}</h4>

    <form method="POST" action="{{ route('user.profile.premium.store') }}">
        @csrf

        <input class="btn--primary" type="submit" value="{{ __('Subscribe') }}">
    </form>

@endsection
