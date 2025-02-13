<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('user')->latest()->paginate(10);

        // dd($blogs, $featuredBlogs);

        return view("blogs.index", [
            "blogs" => $blogs,
        ]);
    }



    public function create()
    {
        return view("blogs.create");
    }


    public function store(Request $request)
    {
        // Validate title, description, image, and imageUrl
        $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "image" => ['nullable', File::types(['png', 'jpg', 'webp'])],
            "imageUrl" => ['nullable', 'url'],
        ]);

        // Ensure at least one image source is provided
        if (!$request->hasFile('image') && is_null($request->input('imageUrl'))) {
            return back()->withErrors([
                'imageUrl' => 'You must provide either an image or an imageUrl.'
            ])->withInput();
        }

        $imagePath = null;
        $imageUrl = $request->input('imageUrl');

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('images');
        }

        // Generate a unique slug from title
        $slug = Str::slug($request->title);
        $count = Blog::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // Create the blog post with both image and imageUrl
        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $imagePath, // Save the uploaded image
            'imageUrl' => $imageUrl, // Save the provided image URL
            'user_id' => Auth::id(),
        ]);

        return redirect('/');
    }



    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }



    public function edit(Blog $blog)
    {
        return view('blogs/edit', [
            'blog' => $blog
        ]);
    }


    public function update(Request $request, Blog $blog)
    {
        // Validate the request
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'image' => ['nullable', File::types(['png', 'jpg', 'webp'])],
            'imageUrl' => ['nullable', 'url'],
        ]);

        // Check if the user is the owner of the blog
        if ($blog->user_id !== Auth::id()) {
            return redirect()->route('blogs.index')->withErrors(['unauthorized' => 'You are not authorized to update this blog.']);
        }

        $imagePath = $blog->image;
        $imageUrl = $blog->imageUrl;

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if it exists and is not an external URL
            if ($imagePath && !filter_var($imagePath, FILTER_VALIDATE_URL) && file_exists(storage_path('app/' . $imagePath))) {
                unlink(storage_path('app/' . $imagePath));
            }
            // Store the new image
            $imagePath = $request->image->store('images');
            $imageUrl = null; // Reset imageUrl if a new image is uploaded
        } elseif ($request->filled('imageUrl')) {
            $imageUrl = $request->input('imageUrl');
            $imagePath = null; // Reset image if an imageUrl is provided
        }

        // Generate a new slug if the title has changed
        if ($blog->title !== $request->title) {
            $slug = Str::slug($request->title);
            $count = Blog::where('slug', 'LIKE', "{$slug}%")->where('id', '!=', $blog->id)->count();
            if ($count > 0) {
                $slug .= '-' . ($count + 1);
            }
        } else {
            $slug = $blog->slug;
        }

        // Update the blog post
        $blog->update([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $imagePath,
            'imageUrl' => $imageUrl,
        ]);

        return redirect()->route('blogs.show', ['blog' => $blog])->with('success', 'Blog updated successfully!');
    }


    public function destroy(Blog $blog): RedirectResponse
    {

        $blog->delete();

        return redirect('/users/dashboard');
    }
}
