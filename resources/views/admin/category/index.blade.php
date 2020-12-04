@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top"><a href="{{ route('admin.category.index') }}">Categorieën</a></h4>

    <a class="btn btn--small" href="{{ route('admin.category.create') }}">Nieuwe categorie</a>

    @if (Session::has('message') && Session::has('message-status'))
        <div class="alert-box {{ Session::get('message-status') === 'error' ? 'alert-box--error' : '' }} {{ Session::get('message-status') === 'success' ? 'alert-box--success' : '' }} hideit">
            <p>{{ Session::get('message') }}</p>
            <svg class="svg-inline--fa fa-times fa-w-11 alert-box__close" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512" data-fa-i2svg=""><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg><!-- <i class="fa fa-times alert-box__close" aria-hidden="true"></i> -->
        </div>
    @endif

    <div class="table-responsive">

        <table>
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Aangemaakt op</th>
                    <th>Bijgewerkt op</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><a href="{{ route('admin.category.show', ['category' => $category->id]) }}" title="">{{ $category->name }}</a></td>
                            <td>{{ $category->created_at->isoformat('D-M-Y HH:mm:ss') }}</td>
                            <td>{{ $category->updated_at->isoformat('D-M-Y HH:mm:ss') }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>

    </div>

    {{ $categories->links() }}

@endsection
