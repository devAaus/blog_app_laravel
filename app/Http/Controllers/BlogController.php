<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class BlogController extends Controller
{

    public function index()
    {
        $blog = Blog::latest()->get();

        return view("blogs.index", [
            "blogs" => $blog
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

        // Create the blog post
        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        // Redirect after successful blog creation
        return redirect('/');
    }




    public function show(string $id)
    {
        //
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
