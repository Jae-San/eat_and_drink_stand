<x-guest-layout>
    <div class="container mx-auto py-8">
        <h2 class="text-3xl font-bold mb-8 text-center">Nos Exposants</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($stands as $stand)
                <div class="bg-white rounded shadow p-6 flex flex-col items-center">
                    <h5 class="text-xl font-bold mb-2">{{ $stand->nom_stand }}</h5>
                    <p class="mb-4">{{ $stand->description ?? 'Pas de description.' }}</p>
                    <a href="#" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded font-semibold transition">Voir le stand</a>
                </div>
            @empty
                <p class="col-span-3 text-center">Aucun stand approuvé pour le moment.</p>
            @endforelse
        </div>
    </div>
</x-guest-layout> 