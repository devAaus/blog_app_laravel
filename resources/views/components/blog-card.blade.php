@props(['blog'])

@php
    use Illuminate\Support\Str;
@endphp

<x-panel>
    <div class="flex flex-col min-h-[450px]">
        <div class="flex items-center justify-center">
            <x-image :image="$blog->image ?? $blog->imageUrl" />
        </div>

        <div class="pt-4 pb-8 space-y-4">
            <h3 class="font-bold">
                <span class="mb-1 block text-sm leading-6 text-indigo-500">Headless UI</span>
                <a href="/blogs/{{ $blog->slug }}" class="hover:underline hover:text-white text-lg">
                    {{ $blog->title }}
                </a>
            </h3>

            <p class="text-sm text-grey">
                {{ Str::words(strip_tags($blog->description), 15, '...') }}
            </p>
        </div>

        <div class="flex items-center justify-between gap-3 mt-auto">
            <x-user-avatar
                :image="Vite::asset('resources/images/default-user.avif')"
                :name="$blog->user->name"
                :tag="$blog->user->userTag"
                width="22"
                height="22"
                pClass="font-semibold hover:underline" />

            <x-date :date="$blog->created_at" />
        </div>
    </div>
</x-panel>
