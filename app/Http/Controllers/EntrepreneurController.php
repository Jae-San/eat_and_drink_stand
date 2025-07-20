<?php

namespace App\Http\Controllers;

class EntrepreneurController extends Controller
{
    public function index()
    {
        return view('entrepreneur.dashboard');
    }
}
