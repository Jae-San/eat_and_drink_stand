@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Résultats de recherche pour : "{{ $query }}"</h2>

    <h3>Stands trouvés :</h3>
    @if($stands->isEmpty())
        <p>Aucun stand trouvé.</p>
    @else
        <ul>
        @foreach($stands as $stand)
            <li><a href="{{ route('stands.show', $stand->id) }}">{{ $stand->nom_stand }}</a></li>
        @endforeach
        </ul>
    @endif

    <h3>Produits trouvés :</h3>
    @if($produits->isEmpty())
        <p>Aucun produit trouvé.</p>
    @else
        <ul>
        @foreach($produits as $produit)
            <li>{{ $produit->nom }} - {{ $produit->prix }} FCFA</li>
        @endforeach
        </ul>
    @endif
</div>
@endsection