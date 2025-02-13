<x-layout>
    <x-page-heading>
        @if (request()->is('search'))
            Results for "{{ request('q') }}"
        @endif
    </x-page-heading>

    <div class="space-y-6">
        @if ($blogs->count())
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                @foreach ($blogs as $blog)
                    <x-blog-card :$blog />
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-center">No results found.</p>
        @endif
    </div>
</x-layout>
