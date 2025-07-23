@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">🏢 {{ $stand->nom_stand }}</h1>
    <p class="mb-4">📝 {{ $stand->description }}</p>

    <h3>🛒 Produits disponibles :</h3>

    @foreach($stand->produits as $produit)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">📦 {{ $produit->nom }}</h5>
                <p class="card-text">📝 {{ $produit->description }}</p>
                <p class="card-text">💰 Prix : {{ number_format($produit->prix, 0, ',', ' ') }} FCFA</p>
            </div>
        </div>
    @endforeach

    @foreach($produits as $produit)
        <div class="card">
            <h4>{{ $produit->nom }}</h4>
            <p>{{ $produit->description }}</p>
            <p>{{ $produit->prix }} FCFA</p>

            <!-- BOUTON À AJOUTER -->
            <a href="{{ route('panier.ajouter', $produit->id) }}" class="btn btn-primary">
                Ajouter au panier 🛒
            </a>
        </div>
    @endforeach

    <a href="{{ route('stands.index') }}" class="btn btn-secondary mt-3">🔙 Retour aux exposants</a>
</div>
@endsection