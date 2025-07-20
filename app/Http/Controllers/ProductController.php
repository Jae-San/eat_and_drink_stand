<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produit;
use App\Models\Stand;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
    
        // Récupérer le stand de l'utilisateur connecté
        $stand = Stand::where('utilisateur_id', $user->id)->first();
    
        // Vérifie que le stand existe
        if (!$stand) {
            return redirect()->back()->withErrors(['stand' => 'Aucun stand trouvé pour cet utilisateur.']);
        }
    
        // Récupère tous les produits liés à ce stand
        $produits = Produit::where('stand_id', $stand->id)->get();
    
        return view('entrepreneur.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation simple
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Récupération de l'utilisateur connecté
        $user = Auth::user();
    
        // Vérification de l'existence d'un stand lié à cet utilisateur
        $stand = Stand::where('utilisateur_id', $user->id)->first();
    
        // S'il n'a pas de stand, on arrête ici
        if (!$stand) {
            return redirect()->back()->withErrors(['stand' => 'Aucun stand trouvé pour cet utilisateur.']);
        }
    
        // Upload de l'image si présente
        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('produits', 'public');
        }
    
        // Création du produit
        Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image_url' => $imagePath,
            'stand_id' => $stand->id,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
    
        // Vérifie que l'utilisateur connecté est bien le propriétaire du produit
        if ($produit->stand->utilisateur_id != Auth::id())  {
            abort(403, "Accès non autorisé.");
        }
    
        return view('entrepreneur.produits.edit', compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'image' => 'nullable|image|max:2048'
        ]);
    
        $produit = Produit::findOrFail($id);
    
        // Vérifie que l'utilisateur connecté est bien le propriétaire du produit
        if ($produit->stand->utilisateur_id != Auth::id())  {
            abort(403, "Accès non autorisé.");
        }
    
        $produit->nom = $request->nom;
        $produit->description = $request->description;
        $produit->prix = $request->prix;
    
        // Si une nouvelle image est téléchargée
        if ($request->hasFile('image')) {
            $produit->image_url = $request->file('image')->store('produits', 'public');
        }
    
        $produit->save();
    
        return redirect()->route('products.index')->with('success', 'Produit mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
    
        // Vérifie que l'utilisateur est le propriétaire
        if ($produit->stand->utilisateur_id != Auth::id())  {
            abort(403, "Accès non autorisé.");
        }
    
        $produit->delete();
    
        return redirect()->route('products.index')->with('success', 'Produit supprimé avec succès.');
    }
}
