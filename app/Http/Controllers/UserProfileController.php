<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('user.profile.show', [
            'user' => Auth::user(),
        ]);
    }

    public function edit()
    {
        return view('user.profile.edit', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request, UpdateUserProfileInformation $updater)
    {
        $updater->update($request->user(), $request->all());

        return redirect(route('user.profile.show'));
    }

    public function subscribeForDigest()
    {
        return $this->digest(true);
    }

    // R: je zou er voor kunnen kiezen om alle controllers altijd van dezelfde CRUD functies te voorzien (altijd dezelfde namen: index, show, update, store,
    // delete) voor meer consitentie en betere leesbaarheid. In dit geval kun je een afzonderlijke Digest controller gebruiken, of, indien dit praktischer
    // is, een geneste resource controller. Zie ook:
    // https://laraveldaily.com/nested-resource-controllers-and-routes-laravel-crud-example/
    // https://laravel.com/docs/8.x/controllers#restful-nested-resources
    public function unsubscribeForDigest()
    {
        return $this->digest(false);
    }

    public function createPremiumSubscription()
    {
        $user = Auth::user();

        return view('user.profile.createPremium', [
            'address' => $user->address ? $user->address : new Address(),
        ]);
    }

    public function storePremiumSubscription(Request $request)
    {
        $data = $this->validatePremiumSubscription($request);

        $user = Auth::user();

        if ($user->address !== null) {
            $address = $user->address;
            $address->fill($data['address']);
        } else {
            $address = new Address($data['address']);
            $address->user_id = $user->id;
        }

        $address->save();

        $user->premium_subscription_expires_at = Carbon::now()->addMonth();
        $user->save();

        return redirect(route('user.profile.show'));
    }

    private function validatePremiumSubscription(Request $request)
    {
        return $request->validate([
            'address.name' => 'required',
            'address.surname' => 'required',
            'address.street_name' => 'required',
            'address.street_number' => 'required',
            'address.zip_code' => 'required',
            'address.city' => 'required',
            'address.phone_number' => 'nullable',
            'has_paid' => 'required|accepted',
        ]);
    }

    private function digest(bool $subscribe)
    {
        $user = Auth::user();

        $user->is_subscribed_to_digest = $subscribe;
        $user->save();

        return redirect(route('user.profile.show'));
    }
}
