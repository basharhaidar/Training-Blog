<?php

namespace App\Policies;

use App\model\Comment;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Comment_po
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function editcomment(User $user ,Comment $comment){
        if ($user->id==$comment->user_id){
            return true;
        }
        return false;

    }
}
