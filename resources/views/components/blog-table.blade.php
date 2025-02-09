@props(['blog'])

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-400">
        <thead class="text-xs  uppercase bg-gray-700 text-gray-400">
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
            <tr class="border-b bg-gray-900 border-gray-700  hover:bg-gray-800 transition-colors duration-300">
                <td class="p-4">
                    <x-image
                        :image="$blog->image ?? Vite::asset('resources/images/default-user.avif')"
                        width="64"
                        height="64" />
                </td>
                <td class="px-6 py-4 font-semibold text-white">
                    <a href="/blogs/{{ $blog->slug }}" class="hover:underline">
                        {{ Str::words($blog->title, 8, '...') }}
                    </a>
                </td>
                <td class="px-6 py-4 flex flex-col md:flex-row items-center gap-2">
                    <x-button href="/users/dashboard" as="a" type="success">
                        Edit
                    </x-button>
                    <x-button href="/users/dashboard" as="a" type="destructive">
                        Remove
                    </x-button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
