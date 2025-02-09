<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("user.index");
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $blogs = $user->blogs;

        return view("user.show", [
            "user" => $user,
            "blogs" => $blogs
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
