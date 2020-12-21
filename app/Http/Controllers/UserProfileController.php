<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('user.profile.show');
    }

    public function edit()
    {
        return view('user.profile.edit');
    }

    public function subscribeForDigest()
    {
        return $this->digest(true);
    }

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

        $address = new Address($data);

        dd($address);

        $user = Auth::user();

        $user->premium_subscription_expires_at = Carbon::now()->addMonth();
        $user->save();

        return redirect(route('user.profile.show'));
    }

    private function validatePremiumSubscription(Request $request)
    {
        return $request->validate([
            'address' => 'required',
            'address' => 'required',
            'address' => 'required',
            'address' => 'required',
            'address' => 'required',
            'address' => 'required',
            'address' => 'nullable',
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
