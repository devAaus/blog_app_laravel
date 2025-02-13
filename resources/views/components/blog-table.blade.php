@props(['blogs'])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-400">
        <thead class="text-xs uppercase border border-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-16 py-3">
                    <span class="sr-only">Image</span>
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr class="border-b border-gray-700  hover:bg-gray-800 transition-colors duration-300">
                    <td class="p-4">
                        <x-image
                            :image="$blog->image ?? $blog->imageUrl"
                            width="64"
                            height="64" />
                    </td>

                    <td class="px-6 py-4 font-semibold text-white text-lg">
                        <a href="/blogs/{{ $blog->slug }}" class="hover:underline">
                            {{ Str::words($blog->title, 6, '...') }}
                        </a>
                    </td>

                    <td class="px-6 py-4 flex flex-col md:flex-row items-center gap-2">
                        <x-button href="/blogs/{{ $blog->slug }}/edit" as="a" type="success">
                            Edit
                        </x-button>

                        <form method="POST" action="{{ route('blogs.destroy', $blog) }}"">
                            @csrf
                            @method('DELETE')

                            <button type="submit">
                                <x-button as="button" type="destructive">
                                    Remove
                                </x-button>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
