@extends('layouts.app')

@section('content')
<div class="container" x-data="{ editing: null, previewUrl: null }">
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
                    <tr x-data="{ showModal: false }">
                        <td>
                            <span x-show="editing !== {{ $produit->id }}">{{ $produit->nom }}</span>
                            <form x-show="editing === {{ $produit->id }}" method="POST" action="{{ route('products.update', $produit->id) }}" enctype="multipart/form-data" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control form-control-sm" required>
                        </td>
                        <td>
                                <input x-show="editing === {{ $produit->id }}" type="text" name="description" value="{{ $produit->description }}" class="form-control form-control-sm">
                                <span x-show="editing !== {{ $produit->id }}">{{ $produit->description }}</span>
                        </td>
                        <td>
                                <input x-show="editing === {{ $produit->id }}" type="number" name="prix" value="{{ $produit->prix }}" class="form-control form-control-sm" required min="0">
                                <span x-show="editing !== {{ $produit->id }}">{{ $produit->prix }} FCFA</span>
                        </td>
                        <td>
                            <template x-if="editing === {{ $produit->id }}">
                                <div>
                                    <input type="file" name="image" class="form-control form-control-sm" @change="previewUrl = URL.createObjectURL($event.target.files[0])">
                                    <template x-if="previewUrl">
                                        <img :src="previewUrl" width="80" class="mt-2">
                                    </template>
                                </div>
                            </template>
                            <template x-if="editing !== {{ $produit->id }}">
                                <img src="{{ $produit->image_url ? asset('storage/' . $produit->image_url) : '' }}" width="80">
                            </template>
                        </td>
                        <td>
                            <button type="button" class="btn btn-sm btn-warning" @click="editing = {{ $produit->id }}">Modifier</button>
                            <button x-show="editing === {{ $produit->id }}" type="submit" class="btn btn-sm btn-success">Enregistrer</button>
                            <button x-show="editing === {{ $produit->id }}" type="button" class="btn btn-sm btn-secondary" @click="editing = null">Annuler</button>
                            </form>
                            <button type="button" class="btn btn-sm btn-danger" @click="showModal = true">Supprimer</button>
                            <!-- Modale de confirmation -->
                            <div x-show="showModal" style="position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(0,0,0,0.5); display:flex; align-items:center; justify-content:center;">
                                <div style="background:white; padding:2rem; border-radius:8px; min-width:300px;">
                                    <p>Confirmer la suppression de ce produit ?</p>
                                    <form action="{{ route('products.destroy', $produit->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Oui, supprimer</button>
                                        <button type="button" class="btn btn-secondary" @click="showModal = false">Annuler</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Vous n'avez pas encore ajouté de produit.</p>
    @endif
</div>
<!-- Alpine.js pour l'interactivité -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
