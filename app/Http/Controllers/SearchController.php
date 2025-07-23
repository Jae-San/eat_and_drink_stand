<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stand;
use App\Models\Produit;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('q');

        // Recherche sur stands (nom ou description)
        $stands = Stand::where('nom_stand', 'like', "%$query%")
                        ->orWhere('description', 'like', "%$query%")
                        ->get();

        // Recherche sur produits (nom ou description)
        $produits = Produit::where('nom', 'like', "%$query%")
                            ->orWhere('description', 'like', "%$query%")
                            ->get();

        return view('search.results', compact('query', 'stands', 'produits'));
    }
}
