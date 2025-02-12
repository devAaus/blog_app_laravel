@props(['user', 'blogs'])

<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <x-user-card :$user />
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
