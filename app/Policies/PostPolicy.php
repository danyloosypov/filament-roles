<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user) 
    {
        if($user->hasRole(['admin', 'superuser', 'writer', 'editor']) || $user->hasPermissionTo('create_post')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post) 
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user) 
    {
        //return $user->hasRole(['writer']);
        if($user->hasRole(['admin', 'superuser', 'writer']) || $user->hasPermissionTo('create_post')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post) 
    {
        return $user->hasRole(['writer', 'editor']);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post) 
    {
        return $user->hasRole(['admin', 'superuser']);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post) 
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post) 
    {
        //
    }
}
