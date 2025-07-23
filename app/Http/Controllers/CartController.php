<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;

class CartController extends Controller
{
    // Ajouter un produit au panier
    public function ajouter(Request $request, $id)
    {
        $produit = Produit::find($id);

        if (!$produit) {
            return redirect()->back()->with('error', 'Produit introuvable');
        }

        // Récupérer le panier actuel ou créer un panier vide
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            $panier[$id]['quantite']++;
        } else {
            $panier[$id] = [
                "nom" => $produit->nom,
                "quantite" => 1,
                "prix" => $produit->prix,
            ];
        }

        session()->put('panier', $panier);

        return redirect()->back()->with('success', 'Produit ajouté au panier avec succès !');
    }

    // Afficher le panier
    public function panier()
    {
        $panier = session()->get('panier', []);
        return view('panier', compact('panier'));
    }

    // Supprimer un produit du panier
    public function supprimer($id)
    {
        $panier = session()->get('panier', []);

        if (isset($panier[$id])) {
            unset($panier[$id]);
            session()->put('panier', $panier);
        }

        return redirect()->route('panier')->with('success', 'Produit supprimé du panier.');
    }

    // Valider la commande
    public function validerCommande()
    {
        // Ici on pourrait enregistrer la commande dans la base de données
        session()->forget('panier');
        return redirect()->route('panier')->with('success', 'Commande validée avec succès !');
    }


public function remove($id)
{
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }
    return redirect()->route('cart.index')->with('success', 'Produit supprimé du panier');
}

public function validateOrder()
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Votre panier est vide');
    }

    // Sauvegarde en base
    $commande = new Commande();
    $commande->stand_id = array_key_first($cart); // pour simplifier (1 seul stand)
    $commande->details_commande = json_encode($cart);
    $commande->date_commande = now();
    $commande->save();

    // Vider le panier
    session()->forget('cart');

    return redirect()->route('cart.index')->with('success', 'Commande validée avec succès !');
}
}