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
        } elseif ($user->role === 'entrepreneur_en_attente') {
            return redirect()->route('attente');
        } elseif ($user->role === 'entrepreneur_rejete') {
            return redirect()->route('rejet');
        }
        return redirect('/');
    }
}
