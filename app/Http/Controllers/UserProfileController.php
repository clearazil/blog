<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function registerForDigest()
    {

    }
}
