@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un produit</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom du produit</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom') }}" required>
            @error('nom')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="prix" class="form-label">Prix (FCFA)</label>
            <input type="number" name="prix" class="form-control" value="{{ old('prix') }}" required min="0">
            @error('prix')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label for="image_url" class="form-label">Image du produit</label>
            <input type="file" name="image_url" class="form-control" accept="image/*">
            @error('image_url')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection 