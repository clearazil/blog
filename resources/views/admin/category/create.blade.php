@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top">
        <a href="{{ route('admin.category.index') }}">Categorieën</a> \
        <a href="{{ route('admin.category.create') }}">Nieuw</a>
    </h4>

    <form method="POST" action="{{ route('admin.category.store') }}">
        @csrf

        <div>
            <label for="name">Naam</label>
            @error('name')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="name" class="h-full-width" type="text" id="name" value="{{ old('name') }}">
        </div>

        <input class="btn--primary" type="submit" value="Verzenden">
    </form>

@endsection
