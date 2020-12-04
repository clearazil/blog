@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top">
        <a href="{{ route('admin.category.index') }}">Categorieën</a> \
        <a href="{{ route('admin.category.show', ['category' => $category->id]) }}">{{ $category->name }}</a> \
        <a href="{{ route('admin.category.edit', ['category' => $category->id]) }}">Bewerken</a>
    </h4>

    <form method="POST" action="{{ route('admin.category.update', ['category' => $category->id]) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Titel</label>
            @error('name')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="name" class="h-full-width" type="text" id="name" value="{{ old('name', $category->name) }}">
        </div>

        <input class="btn--primary" type="submit" value="Verzenden">
    </form>

@endsection
