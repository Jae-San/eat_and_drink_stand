@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mes Produits</h2>

    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($produits->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produits as $produit)
                    <tr>
                        <td>{{ $produit->nom }}</td>
                        <td>{{ $produit->description }}</td>
                        <td>{{ $produit->prix }} FCFA</td>
                        <td>
                            @if($produit->image_url)
                                <img src="{{ asset('storage/' . $produit->image_url) }}" width="80">
                            @else
                                Aucune image
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning">Modifier</a>
                            <a href="#" class="btn btn-sm btn-danger">Supprimer</a>
                        </td>
                    </tr>
                    <form action="{{ route('products.destroy', $produit->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                    </form>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Vous n'avez pas encore ajouté de produit.</p>
    @endif
</div>
@endsection
