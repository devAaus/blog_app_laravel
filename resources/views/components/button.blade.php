@props([
    'href' => '#',
    'active' => false,
    'as' => 'button',
    'type' => 'primary',
])

@php
    $baseClasses = 'rounded py-2 px-6 font-bold focus:outline-none transition-colors duration-300';

    $types = [
        'primary' => 'bg-blue-800 text-white hover:bg-blue-900',
        'destructive' => 'bg-red-600 text-white hover:bg-red-700',
        'ghost' => 'bg-transparent text-white hover:text-black hover:bg-gray-200 border border-gray-300',
        'success' => 'bg-green-600 text-white hover:bg-green-700',
        'warning' => 'bg-yellow-500 text-black hover:bg-yellow-600',
        'link' => 'bg-transparent text-white hover:bg-white/20',
        'none' => 'bg-transparent',
    ];

    // Ensure $type is always a valid string key
    $type = is_string($type) ? $type : 'primary';

    // Use fallback if the provided type is invalid
    $classes = $baseClasses . ' ' . ($types[$type] ?? $types['primary']);

    // Add active state for navlink
    if ($as === 'navlink') {
        $classes .= $active ? ' bg-white/20' : ' hover:bg-white/20';
    }
@endphp

@if ($as === 'navlink' || $as === 'a')
    <a href="{{ $href }}" class="{{ $classes }}" aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
