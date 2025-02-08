<x-layout>
    <x-page-heading>New Blog</x-page-heading>

    <x-forms.form method="POST" action="/blogs" enctype="multipart/form-data">
        <x-forms.input
            label="Title"
            name="title" />

        <x-forms.text-area
            label="Description"
            name="description" />

        <div class="space-y-2">
            <x-forms.input
                label="Image"
                name="image"
                type="file" />

            <div class="flex items-center py-2 gap-2">
                <x-forms.divider />
                <h1 class="font-bold text-xl">OR</h1>
                <x-forms.divider />
            </div>

            <x-forms.input
                label="Image Url"
                name="imageUrl" />
        </div>

        <x-button>Post</x-button>
    </x-forms.form>
</x-layout>
