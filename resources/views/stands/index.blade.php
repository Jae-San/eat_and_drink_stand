<x-guest-layout>
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-extrabold text-indigo-700 mb-10 text-center">Nos Exposants</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($stands as $stand)
                <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center hover:shadow-2xl transition-all duration-300 group relative">
                    <div class="w-20 h-20 mb-4 rounded-full bg-gradient-to-br from-indigo-400 via-purple-400 to-pink-400 flex items-center justify-center text-white text-2xl font-bold shadow-lg group-hover:scale-105 transition-transform duration-200">
                        <span>{{ strtoupper(substr($stand->nom_stand,0,2)) }}</span>
                    </div>
                    <h5 class="text-xl font-bold mb-2 text-indigo-700 text-center">{{ $stand->nom_stand }}</h5>
                    <p class="mb-4 text-gray-500 text-center">{{ $stand->description ?? 'Pas de description.' }}</p>
                    <a href="#" class="inline-block bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 hover:from-indigo-600 hover:to-pink-600 text-white px-6 py-2 rounded-lg font-semibold shadow transition-all duration-200">Voir le stand</a>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500 text-lg">Aucun stand approuvé pour le moment.</p>
            @endforelse
        </div>
    </div>
</x-guest-layout> 