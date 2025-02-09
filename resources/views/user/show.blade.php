@props(['user', 'blogs'])

<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <div class="flex items-center justify-center">
                <x-image
                    :image="$user->avatar ?? Vite::asset('resources/images/default-user.avif')"
                    width="180"
                    height="180" />
            </div>
            <h1 class="font-bold text-4xl">
                {{ $user->name }}
            </h1>
            <p class="text-grey">
                {{ $user->userTag }}
            </p>
        </section>

        <section>
            <x-section-heading>
                {{ $user->name }}'s Blogs
            </x-section-heading>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                @foreach ($blogs as $blog)
                    <x-blog-card :$blog />
                @endforeach
            </div>
        </section>
    </div>

</x-layout>
