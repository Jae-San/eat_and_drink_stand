<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container py-8">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-3xl font-extrabold text-indigo-700">Mes Produits</h2>
        <a href="{{ route('products.create') }}" class="inline-block px-5 py-2 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-semibold rounded-lg shadow-lg hover:scale-105 transition-all duration-200">Ajouter un nouveau produit</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success mb-6">{{ session('success') }}</div>
    @endif
    @if ($products->count())
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach ($products as $product)
            <div class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center hover:shadow-2xl transition-all duration-300 group relative">
                @if($product->image_url)
                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="Image du produit" class="w-32 h-32 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-200">
                @else
                    <div class="w-32 h-32 flex items-center justify-center bg-gray-100 rounded-xl mb-4 text-gray-400">Aucune image</div>
                @endif
                <h3 class="text-xl font-bold text-indigo-700 mb-2 text-center">{{ $product->nom }}</h3>
                <p class="text-gray-500 text-center mb-4">{{ $product->description }}</p>
                <span class="absolute top-4 right-4 bg-gradient-to-r from-indigo-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow">{{ $product->prix }} FCFA</span>
                <div class="flex gap-2 mt-4">
                    <a href="{{ route('products.edit', $product) }}" class="px-4 py-2 bg-indigo-500 text-white rounded-lg font-semibold shadow hover:bg-indigo-600 transition">Modifier</a>
                    <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-2 bg-pink-500 text-white rounded-lg font-semibold shadow hover:bg-pink-600 transition">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    @else
        <div class="text-center text-gray-500 py-12 text-lg">Aucun produit enregistré.</div>
    @endif
</div>
@endsection