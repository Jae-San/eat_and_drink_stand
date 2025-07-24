@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-2 border-gray-200 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 rounded-lg shadow-sm transition-all duration-200']) }}>
