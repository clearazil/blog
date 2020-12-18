<?php

namespace App\Http\Controllers;

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

    private function digest(bool $subscribe)
    {
        $user = Auth::user();

        $user->is_subscribed_to_digest = $subscribe;
        $user->save();

        return redirect(route('user.profile.show'));
    }
}
