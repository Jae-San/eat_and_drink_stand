<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
<div class="bg-dark text-white p-3 mb-4 d-flex justify-content-between align-items-center">
    <div>
        <strong>Admin</strong> — {{ Auth::user()->name ?? Auth::user()->email }}
    </div>
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="text-white me-3">Demandes</a>
        <a href="#" class="text-white me-3">Stands</a>
        <a href="#" class="text-white me-3">Produits</a>
        <a href="#" class="text-white me-3">Commandes</a>
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button type="submit" class="btn btn-sm btn-light">Déconnexion</button>
        </form>
    </nav>
</div>
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
                    <tr>
                        <td>{{ $demande->id }}</td>
                        <td>{{ $demande->nom_entreprise }}</td>
                        <td>{{ $demande->email }}</td>
                        <td>
                            <a href="{{ route('admin.approuver', $demande->id) }}">Approuver</a>
                            <form action="{{ route('admin.rejeter', $demande->id) }}" method="POST" style="display:inline; margin-left:10px;">
                                @csrf
                                <input type="text" name="motif" placeholder="Motif du rejet" required>
                                <button type="submit">Rejeter</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune demande en attente.</p>
    @endif
</div>
@endsection