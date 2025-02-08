<x-layout>
    <div class="flex flex-col items-center gap-4 max-w-3xl mx-auto">
        <div>
            <x-image :image="$blog->image" :width="800" />
        </div>

        <h1 class="font-bold text-center text-5xl mt-8 capitalize">
            {{ $blog->title }}
        </h1>

        <div class="flex items-center gap-3">
            <div class="flex items-center gap-2">
                <x-image
                    image="{{ Vite::asset('resources/images/default-user.avif') }}"
                    width="40"
                    height="40"
                    type="avatar" />
                <a href="/{{ $blog->user->name }}" class="font-semibold text-xl">
                    {{ $blog->user->name }}
                </a>
            </div>
            <p>-</p>
            <p class="text-gray">
                {{ $blog->created_at->format('F j, Y') }}
            </p>
        </div>

        <p class="self-start mt-10">
            {{ $blog->description }}
        </p>
    </div>
</x-layout>
