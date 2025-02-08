@props(['type' => 'primary'])

@php
    $baseClasses = 'rounded py-2 px-6 font-bold focus:outline-none transition';

    $types = [
        'primary' => 'bg-blue-800 text-white hover:bg-blue-900',
        'destructive' => 'bg-red-600 text-white hover:bg-red-700',
        'ghost' => 'bg-transparent text-gray-800 hover:bg-gray-200 border border-gray-300',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
        'warning' => 'bg-yellow-500 text-black hover:bg-yellow-600',
    ];

    // Ensure $type is always a valid string key
    $type = is_string($type) ? $type : 'primary';

    // Use fallback if the provided type is invalid
    $classes = $baseClasses . ' ' . ($types[$type] ?? $types['primary']);
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>
