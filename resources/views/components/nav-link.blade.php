@props(['active' => false])

<a class="{{ $active ? 'bg-white/20 ' : ' hover:bg-white/20' }} text-white rounded-md px-3 py-2 font-bold" aria-current="{{ $active ? 'page' : 'false' }}" {{ $attributes }}>
    {{ $slot }}
</a>
