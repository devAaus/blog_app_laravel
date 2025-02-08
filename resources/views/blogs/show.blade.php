<x-layout>
    <div class="flex flex-col items-center gap-4 max-w-4xl mx-auto">
        <div>
            <x-image :image="$blog->image" :width="800" />
        </div>

        <h1 class="font-bold text-center text-5xl mt-8 capitalize">
            {{ $blog->title }}
        </h1>

        <div class="flex items-center gap-3">
            <x-user-avatar
                image="{{ Vite::asset('resources/images/default-user.avif') }}"
                name="{{ $blog->user->name }}"
                width="40"
                height="40"
                pClass="font-semibold text-xl" />
            <p class="text-gray font-bold text-3xl">·</p>
            <x-date date="{{ $blog->created_at }}" />
        </div>

        <p class="self-start mt-10">
            {!! $blog->description !!}
        </p>
    </div>
</x-layout>
