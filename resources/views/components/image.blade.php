@props(['image', 'width' => 800, 'height' => 200])

<img
    src="{{ $image ? asset($image) : Vite::asset('resources/images/default.jpg') }}"
    alt="blog_image"
    class="border-2 object-cover rounded-xl aspect-video"
    width="{{ $width }}"
    height="{{ $height }}">
