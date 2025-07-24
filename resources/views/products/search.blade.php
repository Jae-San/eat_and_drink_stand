@extends('layouts.app')

@section('content')
<div class="container py-10">
    <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 text-center">Recherche de produits</h2>
    <form method="GET" action="{{ route('products.search') }}" class="max-w-xl mx-auto mb-10 flex gap-2">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Rechercher un produit..." class="flex-1 px-4 py-3 border-2 border-gray-200 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 transition-all duration-200" autofocus>
        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-bold rounded-lg shadow-lg hover:scale-105 transition-all duration-200">Rechercher</button>
    </form>
    @if(isset($results))
        <div class="mb-6 text-center text-gray-600">
            @if(request('q'))
                <span>Résultats pour : <span class="font-semibold text-indigo-700">"{{ request('q') }}"</span></span>
            @else
                <span>Veuillez saisir un mot-clé pour lancer une recherche.</span>
            @endif
        </div>
        @if(count($results) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
                @foreach($results as $product)
                    <div class="bg-white rounded-2xl shadow-xl p-6 flex flex-col items-center hover:shadow-2xl transition-all duration-300 group relative">
                        @if($product->image_url)
                            <img src="{{ asset('storage/' . $product->image_url) }}" alt="Image du produit" class="w-32 h-32 object-cover rounded-xl mb-4 group-hover:scale-105 transition-transform duration-200">
                        @else
                            <div class="w-32 h-32 flex items-center justify-center bg-gray-100 rounded-xl mb-4 text-gray-400">Aucune image</div>
                        @endif
                        <h3 class="text-xl font-bold text-indigo-700 mb-2 text-center">{{ $product->nom }}</h3>
                        <p class="text-gray-500 text-center mb-4">{{ $product->description }}</p>
                        <span class="absolute top-4 right-4 bg-gradient-to-r from-indigo-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow">{{ $product->prix }} FCFA</span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-500 py-12 text-lg">Aucun produit trouvé pour cette recherche.</div>
        @endif
    @endif
</div>
@endsection 