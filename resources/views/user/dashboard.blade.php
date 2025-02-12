@props(['user'])

<x-layout>
    <section class="mx-auto py-8">
        <div class="grid grid-cols-4 lg:grid-cols-12 gap-6">
            <div class="col-span-4 lg:col-span-3">
                <x-user-card :$user />
            </div>
            <div class="col-span-4 lg:col-span-9">
                <div class="bg-white/5 shadow rounded-lg p-6">
                    <h2 class="text-xl font-bold mb-4">My Blogs</h2>

                    @foreach ($user->blogs as $blog)
                        <x-blog-table :$blog />
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-layout>
