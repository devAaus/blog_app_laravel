<x-layout>
    <div class="space-y-10">
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Blog</h1>

            <x-forms.form action="/search" class="mt-6">
                <x-forms.input
                    :label="false"
                    name="q"
                    placeholder="Blog Title" />
            </x-forms.form>
        </section>

        <section>
            <x-section-heading>
                All Blogs
            </x-section-heading>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8 mt-6">
                @foreach ($blogs as $blog)
                    <x-blog-card :$blog />
                @endforeach
            </div>

            <div class="mt-4">
                {{ $blogs->links() }}
            </div>
        </section>
    </div>
</x-layout>
