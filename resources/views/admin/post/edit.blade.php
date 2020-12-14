@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top">
        <a href="{{ route('admin.post.index') }}">Artikelen</a> \
        <a href="{{ route('admin.post.show', ['post' => $post->id]) }}">{{ $post->title }}</a> \
        <a href="{{ route('admin.post.edit', ['post' => $post->id]) }}">Bewerken</a>
    </h4>

    <form method="POST" action="{{ route('admin.post.update', ['post' => $post->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Titel</label>
            @error('title')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="title" class="h-full-width" type="text" id="title" value="{{ old('title', $post->title) }}">
        </div>

        <label for="lead">Lead</label>
        @error('lead')
            <div class="warning">{{ $message }}</div>
        @enderror
        <textarea name="lead" class="h-full-width" id="lead">{{ old('lead', $post->lead) }}</textarea>

        <label for="content">Inhoud</label>
        @error('content')
            <div class="warning">{{ $message }}</div>
        @enderror
        <textarea name="content" class="h-full-width" id="content">{{ (old('content', $post->content)) }}</textarea>

        <div>
            <label for="image">Afbeelding</label>
            @if ($post->image !== null)
                <p>Bij het uploaden van een nieuwe afbeelding wordt de huidige afbeelding vervangen.</p>
                <img class="img-50-percent" src="{{ asset('storage/' . $post->image) }}">
            @endif
            @error('image')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input type="file" name="image" class="h-full-width" id="image">
        </div>

        <div>
            <label for="categories">Categorieën</label>
            @error('categories')
                <div class="warning">{{ $message }}</div>
            @enderror
            <div class="ss-custom-select-multiple">
                <select class="h-full-width" name="categories[]" id="categories" multiple>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"{{ $post->categories->contains($category->id) ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label for="is_premium">Premium</label>
            @error('is_premium')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="is_premium" type="hidden" value="0">
            <input name="is_premium" type="checkbox" value="1" {{ old('is_premium', $post->is_premium)  ? 'checked' : '' }}>
        </div>

        <input class="btn--primary" type="submit" value="Verzenden">
    </form>

@endsection
