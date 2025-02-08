@props(['image', 'name' => null, 'width' => 60, 'height' => 60, 'pClass'])

<a href="/{{ $name }}" class="flex items-center gap-2">
    <img
        src="{{ $image ? asset($image) : Vite::asset('resources/images/default-user.jpg') }}"
        alt="user_avatar"
        class="inline-block size-6 rounded-full ring-2 ring-white"
        width="{{ $width }}"
        height="{{ $height }}">

    @if ($name)
        <p class="{{ $pClass }}">{{ $name }}</p>
    @endif
</a>
