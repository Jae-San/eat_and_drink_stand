<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Ajouter un produit</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="nom">Nom du produit</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="prix">Prix (en FCFA)</label>
                <input type="number" name="prix" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="image_url">Image du produit</label>
                <input type="file" name="image_url" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Enregistrer</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Retour</a>
        </form>
    </div>
@endsection