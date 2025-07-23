<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 bg-white p-8 rounded shadow text-center">
        <h2 class="text-2xl font-bold mb-4 text-red-700">Votre demande a été rejetée</h2>
        @if($motif)
            <p class="mb-2"><strong>Motif :</strong> {{ $motif }}</p>
        @endif
        <p>Pour toute question, contactez l'organisation.</p>
        <a href="/" class="inline-block mt-6 text-blue-600 hover:underline">Retour à l'accueil</a>
    </div>
</x-guest-layout> 