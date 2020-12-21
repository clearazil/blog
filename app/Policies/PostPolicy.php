<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAdmin(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function view(User $user, Post $post)
    {
        if ($post->is_premium) {
            return $user->hasPremium();
        }

        return true;
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
