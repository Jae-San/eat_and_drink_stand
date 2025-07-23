<?php

namespace App\Http\Controllers;

use App\Models\Stand;
use App\Models\User;
use Illuminate\Http\Request;

class StandController extends Controller
{
    public function index()
    {
        // On récupère les stands dont l'utilisateur est approuvé
        $stands = Stand::whereHas('utilisateur', function($q) {
            $q->where('role', 'entrepreneur_approuve');
        })->get();
        return view('stands.index', compact('stands'));
    }
} 