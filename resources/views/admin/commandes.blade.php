@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des commandes</h1>
    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Stand</th>
            <th>Détails de la commande</th>
            <th>Date</th>
        </tr>
        @foreach ($commandes as $commande)
        <tr>
            <td>{{ $commande->id }}</td>
            <td>{{ $commande->stand->nom_stand ?? 'Non défini' }}</td>
            <td>{{ $commande->details_commande }}</td>
            <td>{{ $commande->date_commande }}</td>
        </tr>
        @endforeach
    </table>
</div>
@endsection