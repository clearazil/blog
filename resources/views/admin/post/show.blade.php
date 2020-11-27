@extends('layouts.admin')

@section('content')

    <h4 class="h-remove-top"><a href="{{ route('admin.post.index') }}">Artikelen</a> \ <a href="{{ route('post.show', ['post' => $post->id]) }}" title="">{{ $post->title }}</a></h4>

    <div class="table-responsive">

        <table>
            <tbody>
                <tr>
                    <th>Titel</th>
                    <td>{{ $post->title }}</td>
                </tr>
                <tr>
                    <th>Aangemaakt op</th>
                    <td>{{ $post->created_at->isoformat('D-M-Y h:m:s') }}</td>
                </tr>
                <tr>
                    <th>Bijgewerkt op</th>
                    <td>{{ $post->updated_at->isoformat('D-M-Y h:m:s') }}</td>
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
            </tbody>
        </table>

    </div>

@endsection