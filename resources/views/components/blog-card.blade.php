@props(['blog'])

@php
    use Illuminate\Support\Str;
@endphp

<x-panel>
    <div class="flex flex-col">
        <div class="flex items-center justify-center">
            <x-image :image="$blog->image" />
        </div>

        <div class="pt-4 pb-8 space-y-4">
            <h3 class="text-xl font-bold transition-colors duration-300">
                {{ Str::words($blog->title, 4, '...') }}
            </h3>

            <p class="text-sm text-grey">
                {{ Str::words(strip_tags($blog->description), 15, '...') }}
                <a href="/blogs/{{ $blog->slug }}" class="hover:underline hover:text-white ml-2">
                    Read more
                </a>
            </p>
        </div>

        <div class="flex items-center justify-between gap-3 mt-auto">

            <x-user-avatar
                image="{{ Vite::asset('resources/images/default-user.avif') }}"
                name="{{ $blog->user->name }}"
                width="22"
                height="22"
                pClass="font-semibold" />

            <x-date :date="$blog->created_at" />
        </div>
    </div>
</x-panel>
