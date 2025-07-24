@extends('layouts.app')

@section('content')
<div class="container py-10">
    <h2 class="text-3xl font-extrabold text-indigo-700 mb-8 text-center">Mon Panier</h2>
    @php $total = 0; @endphp
    @if(session('success'))
        <div class="alert alert-success mb-6">{{ session('success') }}</div>
    @endif
    @if(!empty($panier) && count($panier) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            @foreach($panier as $id => $item)
                @php $total += $item['prix'] * $item['quantite']; @endphp
                <div class="bg-white rounded-2xl shadow-xl p-6 flex flex-col md:flex-row items-center gap-6 hover:shadow-2xl transition-all duration-300 group relative">
                    <div class="flex-1 w-full">
                        <h3 class="text-xl font-bold text-indigo-700 mb-2">{{ $item['nom'] }}</h3>
                        <p class="text-gray-500 mb-2">Quantité : <span class="font-semibold">{{ $item['quantite'] }}</span></p>
                        <span class="bg-gradient-to-r from-indigo-500 to-pink-500 text-white px-3 py-1 rounded-full text-sm font-semibold shadow">{{ $item['prix'] }} FCFA</span>
                    </div>
                    <form action="{{ route('panier.supprimer', $id) }}" method="POST" onsubmit="return confirm('Retirer ce produit du panier ?')">
                        @csrf
                        <button class="px-4 py-2 bg-pink-500 text-white rounded-lg font-semibold shadow hover:bg-pink-600 transition">Supprimer</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class="bg-white rounded-2xl shadow-xl p-6 max-w-md mx-auto flex flex-col items-center">
            <h4 class="text-lg font-bold mb-4">Total du panier</h4>
            <div class="text-2xl font-extrabold text-indigo-700 mb-4">{{ $total }} FCFA</div>
            <form action="{{ route('panier.valider') }}" method="POST">
                @csrf
                <button class="px-8 py-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 text-white font-bold rounded-lg shadow-lg hover:scale-105 transition-all duration-200">Valider la commande</button>
            </form>
        </div>
    @else
        <div class="text-center text-gray-500 py-12 text-lg">Votre panier est vide.</div>
    @endif
</div>
@endsection 