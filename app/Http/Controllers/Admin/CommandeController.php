<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Commande;

class CommandeController extends Controller
{
    public function index()
    {
        // Récupérer toutes les commandes avec leur stand associé
        $commandes = Commande::with('stand')->orderBy('date_commande', 'desc')->get();

        return view('admin.commandes.index', compact('commandes'));
    }
    public function store(Request $request)
    {
        // Récupérer le panier de la session
        $panier = Session::get('panier', []);

        if (empty($panier)) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }

        // Sauvegarder la commande
        Commande::create([
            'stand_id' => 1, // TODO: remplacer par le stand actuel ou celui du panier
            'details_commande' => json_encode($panier),
        ]);

        // Vider le panier
        Session::forget('panier');

        return redirect()->back()->with('success', 'Commande passée avec succès !');
    }
}

