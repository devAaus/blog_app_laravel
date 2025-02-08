<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('user')->latest()->paginate(6);
        // $featuredBlogs = $blogs->groupBy('isFeatured');

        return view("blogs.index", [
            "blogs" => $blogs,
            // "featuredBlogs" => $featuredBlogs[1]
        ]);
    }


    public function create()
    {
        return view("blogs.create");
    }


    public function store(Request $request)
    {
        // Validate title and description
        $request->validate([
            "title" => ["required", "string"],
            "description" => ["required", "string"],
            "image" => ['nullable', File::types(['png', 'jpg', 'webp'])],
            "imageUrl" => ['nullable', 'url'],
        ]);

        // Check if either image or imageUrl is provided
        if (!$request->hasFile('image') && is_null($request->input('imageUrl'))) {
            // Return an error message and stop the flow if neither is provided
            return back()->withErrors([
                'imageUrl' => 'You must provide either an image or an imageUrl.'
            ])->withInput();
        }

        $imagePath = null;

        // Handle image upload or imageUrl
        if ($request->hasFile('image')) {
            $imagePath = $request->image->store('images');
        } else {
            $imagePath = $request->input('imageUrl');
        }

        // Generate a unique slug from title
        $slug = Str::slug($request->title);

        // Ensure the slug is unique by appending a number if needed
        $count = Blog::where('slug', 'LIKE', "{$slug}%")->count();
        if ($count > 0) {
            $slug .= '-' . ($count + 1);
        }

        // Create the blog post
        Blog::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        // Redirect after successful blog creation
        return redirect('/');
    }




    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog
        ]);
    }



    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
