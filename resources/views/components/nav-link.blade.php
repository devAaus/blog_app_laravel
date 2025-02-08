@props(['href' => '#', 'active' => false, 'as' => 'a'])

@if ($as === 'navlink')
    <a href="{{ $href }}" class="{{ $active ? 'bg-white/20' : 'hover:bg-white/20' }} text-white rounded-md px-3 py-2 font-bold" aria-current="{{ $active ? 'page' : 'false' }}"
        {{ $attributes }}>
        {{ $slot }}
    </a>
@else
    <a href="{{ $href }}" class="text-white px-3 py-2 font-bold" {{ $attributes }}>
        {{ $slot }}
    </a>
@endif
