@props(['image', 'width' => 350, 'height' => 200, 'type' => 'image'])

<img
    src="{{ $image ? asset($image) : Vite::asset('resources/images/default.jpg') }}"
    alt="{{ $type === 'avatar' ? 'user_avatar' : 'blog_image' }}"
    class="border object-cover {{ $type === 'avatar' ? 'rounded-full' : 'rounded-xl aspect-video' }}"
    width="{{ $width }}"
    height="{{ $height }}">
