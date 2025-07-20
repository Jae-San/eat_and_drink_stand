@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier le produit</h2>

    <form method="POST" action="{{ route('products.update', $produit->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" name="nom" value="{{ old('nom', $produit->nom) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $produit->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" name="prix" value="{{ old('prix', $produit->prix) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Changer l'image (optionnel)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
    </form>
</div>
@endsection