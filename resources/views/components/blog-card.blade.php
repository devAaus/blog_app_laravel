@props(['blog'])

<x-panel :href="$blog->slug" class="flex flex-col items-center">
    <div>
        <x-image :image="$blog->image" />
    </div>

    <div class="py-8">
        <h3 class=" text-xl font-bold transition-colors duration-300">
            {{ $blog->title }}
        </h3>

        <p class="text-sm mt-4">{{ $blog->description }}</p>
    </div>
</x-panel>
