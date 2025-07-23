@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des commandes</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Stand</th>
                <th>Détails</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($commandes as $commande)
                <tr>
                    <td>{{ $commande->id }}</td>
                    <td>{{ $commande->stand->nom_stand ?? 'N/A' }}</td>
                    <td>{{ $commande->details_commande }}</td>
                    <td>{{ $commande->date_commande }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection