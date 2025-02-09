<x-layout>
    <section class="max-w-4xl mx-auto px-4">
        <div class="flex items-center justify-center">
            <x-image :image="$blog->image" :width="800" />
        </div>

        <div class="flex flex-col items-center gap-4 mb-20 mt-8">
            <h1 class="font-bold text-center text-xl md:text-4xl capitalize">
                {{ $blog->title }}
            </h1>

            <div class="flex items-center gap-3">
                <x-user-avatar
                    :image="Vite::asset('resources/images/default-user.avif')"
                    :name="$blog->user->name"
                    :tag="$blog->user->userTag"
                    width="40"
                    height="40"
                    pClass="font-semibold text-base md:text-xl hover:underline" />

                <p class="text-grey font-bold text-3xl">·</p>

                <x-date date="{{ $blog->created_at }}" />
            </div>
        </div>

        <div class="text-white/80 text-lg px-3">
            {!! $blog->description !!}
        </div>
    </section>
</x-layout>
