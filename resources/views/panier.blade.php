<!-- resources/views/panier.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Votre Panier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
               
                @if(session('cart') && count(session('cart')) > 0)
                    <table class="table-auto w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border">Produit</th>
                                <th class="px-4 py-2 border">Quantité</th>
                                <th class="px-4 py-2 border">Prix Unitaire</th>
                                <th class="px-4 py-2 border">Total</th>
                                <th class="px-4 py-2 border">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach(session('cart') as $key => $item)
                                @php
                                    $total += $item['prix'] * $item['quantite'];
                                @endphp
                                <tr>
                                    <td class="border px-4 py-2">{{ $item['nom'] }}</td>
                                    <td class="border px-4 py-2">{{ $item['quantite'] }}</td>
                                    <td class="border px-4 py-2">{{ number_format($item['prix'], 2) }} F</td>
                                    <td class="border px-4 py-2">{{ number_format($item['prix'] * $item['quantite'], 2) }} F</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('cart.remove', $key) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="border px-4 py-2 text-right font-bold">Total :</td>
                                <td class="border px-4 py-2 font-bold">{{ number_format($total, 2) }} F</td>
                                <td class="border px-4 py-2"></td>
                            </tr>
                        </tbody>
                    </table>

                    <form action="{{ route('cart.validate') }}" method="POST" class="mt-4">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Valider la commande</button>
                    </form>
                @else
                    <p class="text-gray-500">Votre panier est vide.</p>
                @endif

                <div style="margin-top: 20px;">
                    <form action="{{ route('commande.store') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">
                            Passer la commande
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>