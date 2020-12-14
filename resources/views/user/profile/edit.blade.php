@extends('layouts.app')

@section('content')

    <h4 class="h-remove-top">{{ __('Edit Profile') }}</h4>

    <form method="POST" action="{{ route('user-profile-information.update') }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam</label>
            @error('name')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="name" class="h-full-width" type="text" id="name" value="{{ old('name', auth()->user()->name) }}">
        </div>

        <div>
            <label for="email">Naam</label>
            @error('email')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="email" class="h-full-width" type="text" id="email" value="{{ old('email', auth()->user()->email) }}">
        </div>

        <input class="btn--primary" type="submit" value="{{ __('Update Profile') }}">
    </form>

@endsection
