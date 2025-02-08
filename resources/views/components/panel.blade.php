@props(['href'])

@php
    $classes = 'p-4 bg-white/5 rounded-xl border border-transparent hover:border-white hover:cursor-pointer group transition-colors duration-300';
@endphp

<div {{ $attributes(['class' => $classes]) }}>
    <a href="/blogs/{{ $href }}">
        {{ $slot }}
    </a>
</div>
