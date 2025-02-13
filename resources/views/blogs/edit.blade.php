<x-layout>
    <x-page-heading>Edit Blog</x-page-heading>

    <x-forms.form method="POST" action="/blogs/{{ $blog->slug }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <x-forms.input
            label="Title"
            name="title"
            value="{{ old('title', $blog->title) }}" />

        <x-forms.text-area
            id="myeditorinstance"
            label="Description"
            name="description"
            :value="old('description', $blog->description)" />

        <div class="space-y-2">
            <x-forms.input
                label="Image"
                name="image"
                type="file" />

            @if ($blog->image)
                <x-image
                    :image="asset($blog->image)"
                    width="300"
                    height="300" />
            @endif

            <div class="flex items-center py-2 gap-2">
                <x-forms.divider />
                <h1 class="font-bold text-xl">OR</h1>
                <x-forms.divider />
            </div>

            <x-forms.input
                label="Image Url"
                name="imageUrl"
                value="{{ old('imageUrl', $blog->imageUrl) }}" />
        </div>

        <x-button>Update</x-button>
    </x-forms.form>
</x-layout>
