<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role === 'entrepreneur_approuve') {
            return redirect()->route('entrepreneur.dashboard');
        } else {
            return redirect('/')->with('error', 'Votre demande est en attente d’approbation.');
        }
    }
}
