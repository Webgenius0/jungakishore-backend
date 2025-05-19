<?php

namespace App\Policies\V1;

use App\Models\User;

class PondPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    // public function view(User $user, Pond $pond)
    // {
    //     return
    //         $user->id === $pond->created_by ||
    //         $user->id === $pond->assigned_to ||
    //         in_array($pond->created_by, $user->allDescendantIds());
    // }
}
