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
                @foreach ($demandes as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom_entreprise }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.approuver', $user->id) }}">
                                @csrf
                                <button type="submit">✅ Approuver</button>
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