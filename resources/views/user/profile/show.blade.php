@extends('layouts.app')

@section('content')

    <h4 class="h-remove-top">Account</h4>

    <a class="btn btn--small" href="{{ route('user.profile.edit') }}">Bewerken</a>

    <div class="table-responsive">

        <table>
            <tbody>
                <tr>
                    <th>Naam</th>
                    <td>{{ auth()->user()->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ auth()->user()->email }}</td>
                </tr>
                <tr>
                    <th>Digest</th>
                    <td>Niet ingeschreven | <a href="">Inschrijven</a></td>
                </tr>
            </tbody>
        </table>

    </div>

@endsection
