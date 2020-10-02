<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show the index page
     */
    public function index()
    {
        return view('home.index');
    }
}
