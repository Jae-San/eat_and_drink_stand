@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">🌟 Nos Exposants</h1>

    @foreach($stands as $stand)
        <div class="card mb-3">
            <div class="card-body">
                <h4 class="card-title">🏢 {{ $stand->nom_stand }}</h4>
                <p class="card-text">📝 {{ $stand->description }}</p>
                <a href="{{ route('stands.show', $stand->id) }}" class="btn btn-primary">Voir ce stand</a>
            </div>
        </div>
    @endforeach
</div>
@endsection