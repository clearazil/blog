@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top">
        <a href="{{ route('admin.post.index') }}">Artikelen</a> \
        <a href="{{ route('admin.post.create') }}">Nieuw</a>
    </h4>

    <form method="POST" action="{{ route('admin.post.store') }}">
        @csrf

        <div>
            <label for="title">Titel</label>
            @error('title')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="title" class="h-full-width" type="text" id="title" value="{{ old('title') }}">
        </div>

        <label for="lead">Lead</label>
        @error('lead')
            <div class="warning">{{ $message }}</div>
        @enderror
        <textarea name="lead" class="h-full-width" id="lead">{{ old('lead') }}</textarea>

        <label for="content">Inhoud</label>
        @error('content')
            <div class="warning">{{ $message }}</div>
        @enderror
        <textarea name="content" class="h-full-width" id="content">{{ old('content') }}</textarea>

        <div>
            <label for="is_premium">Premium</label>
            @error('is_premium')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="is_premium" type="checkbox" {{ old('is_premium') ? 'checked' : '' }}>
        </div>

        <input class="btn--primary" type="submit" value="Verzenden">
    </form>

@endsection
