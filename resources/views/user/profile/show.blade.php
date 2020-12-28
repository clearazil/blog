@extends('layouts.app')

@section('content')

    <h4 class="h-remove-top">Account</h4>

    <a class="btn btn--small" href="{{ route('user.profile.edit') }}">Bewerken</a>

    <div class="table-responsive">

        <table>
            <tbody>
                <tr>
                    <th>Naam</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Digest</th>
                    <td>
                        @if ($user->is_subscribed_to_digest)
                            Ingeschreven | <a href="{{ route('user.profile.digest.unsubscribe') }}">Uitschrijven</a>
                        @else
                            Niet ingeschreven | <a href="{{ route('user.profile.digest.subscribe') }}">Inschrijven</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Premium Content</th>
                    <td>
                        @if ($user->hasPremium())
                            Abonnement verloopt op {{ $user->premium_subscription_expires_at->isoformat('D-M-Y HH:mm:ss') }}
                        @elseif ($user->hadPremium())
                            Abonnement verlopen | <a href="{{ route('user.profile.premium.create') }}">Opnieuw Abonneren</a>
                        @else
                            Niet geabonneerd | <a href="{{ route('user.profile.premium.create') }}">Abonneren</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

    @if ($user->address)
        <h4>Adres</h4>
        <div class="table-responsive">

            <table>
                <tbody>
                    <tr>
                        <th>Naam</th>
                        <td>{{ $user->address->name }} {{ $user->address->surname }}</td>
                    </tr>
                    <tr>
                        <th>Adres</th>
                        <td>{{ $user->address->street_name }} {{ $user->address->street_number }}</td>
                    </tr>
                    <tr>
                        <th>Postcode</th>
                        <td>{{ $user->address->zip_code }}</td>
                    </tr>
                    <tr>
                        <th>Plaats</th>
                        <td>{{ $user->address->city }}</td>
                    </tr>
                    <tr>
                        <th>Telefoonnummer</th>
                        <td>{{ $user->address->phone_number }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    @endif

@endsection
