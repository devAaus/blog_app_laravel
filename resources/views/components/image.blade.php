@props(['image', 'width' => 350, 'height' => 200])

<img
    src="{{ $image ? asset($image) : Vite::asset('resources/images/default.jpg') }}"
    alt="blog_image"
    class="rounded-xl border aspect-video object-cover"
    width="{{ $width }}"
    height="{{ $height }}">
