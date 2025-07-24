<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 shadow-lg border border-transparent rounded-lg font-bold text-base text-white uppercase tracking-widest hover:scale-105 hover:from-indigo-600 hover:to-pink-600 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2 transition-all duration-200']) }}>
    {{ $slot }}
</button>
