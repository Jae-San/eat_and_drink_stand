<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Commande;
use App\Models\Stand;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }
    // Affiche la liste des entrepreneurs en attente
    public function dashboard()
    {
        // On récupère tous les utilisateurs avec le rôle 'entrepreneur_en_attente'
        $demandes = User::where('role', 'entrepreneur_en_attente')->get();

        // On passe ces utilisateurs à la vue dashboard
        return view('admin.dashboard', compact('demandes'));
    }
    

    public function approuver($id)
    {
        $user = User::findOrFail($id);
       
        // Mettre à jour le rôle
        $user->role = 'entrepreneur_approuve';
        $user->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Demande approuvée avec succès.');
    }

    public function commandes()
    {
        // Récupération de toutes les commandes avec leur stand associé
        $commandes = Commande::with('stand')->get();

        return view('admin.commandes', compact('commandes'));
    }
}
