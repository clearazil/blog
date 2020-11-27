@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top"><a href="{{ route('admin.post.index') }}">Artikelen</a></h4>

    <div class="table-responsive">

        <table>
                <thead>
                <tr>
                    <th>Titel</th>
                    <th>Schrijver</th>
                    <th>Aangemaakt op</th>
                    <th>Bijgewerkt op</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td><a href="{{ route('admin.post.show', ['post' => $post->id]) }}" title="">{{ $post->title }}</a></td>
                            <td>{{ $post->user->name }}</td>
                            <td>{{ $post->created_at->isoformat('D-M-Y h:m:s') }}</td>
                            <td>{{ $post->updated_at->isoformat('D-M-Y h:m:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>

    </div>

    {{ $posts->links() }}

@endsection
