@extends('layouts.app')

@section('content')

    <h4 class="h-remove-top">{{ __('Subscribe to premium content') }}</h4>

    <form method="POST" action="{{ route('user.profile.premium.store') }}">
        @csrf

        <div>
            <label for="address[name]">Naam</label>
            @error('address.name')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[name]" class="h-full-width" type="text" id="name" value="{{ old('address.name', $address->name) }}">
        </div>

        <div>
            <label for="address[surname]">Achternaam</label>
            @error('address.surname')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[surname]" class="h-full-width" type="text" id="surname" value="{{ old('address.surname', $address->surname) }}">
        </div>

        <div>
            <label for="address[street_name]">Straat</label>
            @error('address.street_name')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[street_name]" class="h-full-width" type="text" id="street_name" value="{{ old('address.street_name', $address->street_name) }}">
        </div>

        <div>
            <label for="address[street_number]">Huisnummer</label>
            @error('address.street_number')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[street_number]" class="h-full-width" type="text" id="street_number" value="{{ old('address.street_number', $address->street_number) }}">
        </div>

        <div>
            <label for="address[zip_code]">Postcode</label>
            @error('address.zip_code')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[zip_code]" class="h-full-width" type="text" id="zip_code" value="{{ old('address.zip_code', $address->zip_code) }}">
        </div>

        <div>
            <label for="address[city]">Plaats</label>
            @error('address.city')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[city]" class="h-full-width" type="text" id="city" value="{{ old('address.city', $address->city) }}">
        </div>

        <div>
            <label for="address[phone_number]">Telefoonnummer</label>
            @error('address.phone_number')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="address[phone_number]" class="h-full-width" type="text" id="phone_number" value="{{ old('address.phone_number', $address->phone_number) }}">
        </div>

        <div>
            <label for="has_paid">Ik heb betaald</label>
            @error('has_paid')
                <div class="warning">{{ $message }}</div>
            @enderror
            <input name="has_paid" type="hidden" value="0">
            <input name="has_paid" type="checkbox" {{ old('has_paid') ? 'checked' : '' }}>
        </div>

        <input class="btn--primary" type="submit" value="{{ __('Subscribe') }}">
    </form>

@endsection
