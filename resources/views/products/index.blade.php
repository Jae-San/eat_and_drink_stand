<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Mes Produits</h2>

        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Ajouter un nouveau produit</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->nom }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->prix }} FCFA</td>
                        <td>
                            @if($product->image_url)
                                <img src="{{ asset('storage/' . $product->image_url) }}" width="60" alt="Image du produit">
                            @else
                                Aucune image
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Modifier</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Supprimer ce produit ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5">Aucun produit enregistré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection