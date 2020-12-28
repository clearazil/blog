@extends('layouts.app')

@section('content')

    <h4 class="h-remove-top">{{ __('Edit Profile') }}</h4>

    <form method="POST" action="{{ route('user.profile.update') }}">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Naam</label>
            @error('name', 'updateProfileInformation')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="name" class="h-full-width" type="text" id="name" value="{{ old('name', $user->name) }}">
        </div>



        <div>
            <label for="email">Naam</label>
            @error('email', 'updateProfileInformation')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="email" class="h-full-width" type="text" id="email" value="{{ old('email', $user->email) }}">
        </div>

        @if ($user->address !== null)
            <b>Adres</b>
            <div>
                <label for="address[name]">Naam</label>
                @error('address.name', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[name]" class="h-full-width" type="text" id="name" value="{{ old('address.name', $user->address->name) }}">
            </div>

            <div>
                <label for="address[surname]">Achternaam</label>
                @error('address.surname', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[surname]" class="h-full-width" type="text" id="surname" value="{{ old('address.surname', $user->address->surname) }}">
            </div>

            <div>
                <label for="address[street_name]">Straat</label>
                @error('address.street_name', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[street_name]" class="h-full-width" type="text" id="street_name" value="{{ old('address.street_name', $user->address->street_name) }}">
            </div>

            <div>
                <label for="address[street_number]">Huisnummer</label>
                @error('address.street_number', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[street_number]" class="h-full-width" type="text" id="street_number" value="{{ old('address.street_number', $user->address->street_number) }}">
            </div>

            <div>
                <label for="address[zip_code]">Postcode</label>
                @error('address.zip_code', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[zip_code]" class="h-full-width" type="text" id="zip_code" value="{{ old('address.zip_code', $user->address->zip_code) }}">
            </div>

            <div>
                <label for="address[city]">Plaats</label>
                @error('address.city', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[city]" class="h-full-width" type="text" id="city" value="{{ old('address.city', $user->address->city) }}">
            </div>

            <div>
                <label for="address[phone_number]">Telefoonnummer</label>
                @error('address.phone_number', 'updateProfileInformation')
                    <div class="warning">{{ $message }}</div>
                @enderror
                <input name="address[phone_number]" class="h-full-width" type="text" id="phone_number" value="{{ old('address.phone_number', $user->address->phone_number) }}">
            </div>
        @endif

        <input class="btn--primary" type="submit" value="{{ __('Update Profile') }}">
    </form>

@endsection
