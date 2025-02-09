<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ]);

        // Generate userTag from name
        $userTagBase = '@' . Str::lower(Str::replace(' ', '', $credentials['name']));

        // Ensure uniqueness by appending a random number if needed
        $userTag = $userTagBase;
        while (User::where('userTag', $userTag)->exists()) {
            $userTag = $userTagBase . rand(100, 999);
        }

        // dd($credentials, $userTag);

        // Create user with userTag
        User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
            'userTag' => $userTag,
        ]);

        return redirect('/login');
    }
}
