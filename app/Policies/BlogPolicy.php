<?php

namespace App\Policies;

use App\Models\Blog;
use App\Models\User;

class BlogPolicy
{
    /**
     * Create a new policy instance.
     */
    public function edit(User $user, Blog $blog): bool
    {
        return $blog->user->is($user);
    }
}
