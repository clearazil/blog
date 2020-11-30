@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top">
        <a href="{{ route('admin.post.index') }}">Artikelen</a> \
        <a href="{{ route('admin.post.show', ['post' => $post->id]) }}" title="">{{ $post->title }}</a>
    </h4>

    <a class="btn btn--small" href="{{ route('admin.post.edit', ['post' => $post->id]) }}">Bewerken</a>

    <div class="table-responsive">

        <table>
            <tbody>
                <tr>
                    <th>Titel</th>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <th>Aangemaakt op</th>
                    <td>{{ $post->created_at->isoformat('D-M-Y HH:mm:ss') }}</td>
                </tr>
                <tr>
                    <th>Bijgewerkt op</th>
                    <td>{{ $post->updated_at->isoformat('D-M-Y HH:mm:ss') }}</td>
                </tr>
                <tr>
                    <th>Schrijver</th>
                    <td>{{ $post->user->name }}</td>
                </tr>
                <tr>
                    <th>Lead</th>
                    <td>{!! nl2br(e($post->lead)) !!}</td>
                </tr>
                <tr>
                    <th>Inhoud</th>
                    <td>{!! nl2br(e($post->content)) !!}</td>
                </tr>
                <tr>
                    <th>Premium</th>
                    <td>{{ $post->is_premium ? 'Ja' : 'Nee' }}</td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection
