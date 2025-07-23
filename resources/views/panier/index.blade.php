@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Votre panier</h2>

    @if(session('success'))
        <p style="color:green;">{{ session('success') }}</p>
    @endif

    @if(count($panier) > 0)
        <ul>
            @foreach($panier as $id => $item)
                <li>
                    {{ $item['nom'] }} - {{ $item['prix'] }} x {{ $item['quantite'] }}
                    <a href="{{ route('panier.retirer', $id) }}">Retirer</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Votre panier est vide.</p>
    @endif

    @if(count($panier) > 0)
        <form action="{{ route('commande.valider') }}" method="POST">
            @csrf
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    ✅ Valider la commande
                </button>
            </form>
    @endif
</div>
@endsection