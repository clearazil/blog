@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top">
        <a href="{{ route('admin.category.index') }}">Categorieën</a> \
        <a href="{{ route('admin.category.show', ['category' => $category->id]) }}" title="">{{ $category->name }}</a>
    </h4>

    <a class="btn btn--small" href="{{ route('admin.category.edit', ['category' => $category->id]) }}">Bewerken</a>
    <form method="POST" action="{{ route('admin.category.delete', ['category' => $category->id])}}">
        @csrf
        @method('DELETE')
        <button class="btn btn--small" href="{{ route('admin.category.delete', ['category' => $category->id]) }}">Verwijderen</button>
    </form>

    <div class="table-responsive">

        <table>
            <tbody>
                <tr>
                    <th>Naam</th>
                    <td>{{ $category->name }}</td>
                </tr>
                <tr>
                    <th>Aangemaakt op</th>
                    <td>{{ $category->created_at->isoformat('D-M-Y HH:mm:ss') }}</td>
                </tr>
                <tr>
                    <th>Bijgewerkt op</th>
                    <td>{{ $category->updated_at->isoformat('D-M-Y HH:mm:ss') }}</td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection
