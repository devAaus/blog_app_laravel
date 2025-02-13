<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $blogs = Blog::query()
            ->with('user')
            ->where('title', 'LIKE', '%' . request('q') . '%')
            ->get();

        return view('results', ['blogs' => $blogs]);
    }
}
