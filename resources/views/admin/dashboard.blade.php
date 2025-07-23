<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Demandes en attente</h2>

    @if (session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    @if ($demandes->count() > 0)
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom de l'entreprise</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($demandes as $demande)
                    <li>
                        {{ $demande->nom_entreprise }} - {{ $demande->email }}
                        <a href="{{ route('admin.approuver', $demande->id) }}"> Approuver</a>
                    </li>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune demande en attente.</p>
    @endif
</div>
@endsection

@section('content')
<div class="container">
    <h1>Tableau de bord Administrateur</h1>

    <div class="mt-4">
        <a href="{{ route('admin.commandes.index') }}" class="btn btn-primary">
            Voir les Commandes
        </a>
    </div>
</div>
@endsection