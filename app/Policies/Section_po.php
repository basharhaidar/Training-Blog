<?php

namespace App\Policies;

use App\Http\Controllers\admin\post\post_cont;
use App\model\Section;
use App\model\post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Section_po
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

    public function before(User $user)
    {
        if ($user->role == 'admin') {

            return true;
        }
    }

    public function control_post(User $user,Section $section)
    {
        if($user->id==$section->admin)
        {
            return true;
        }
        return false;

    }


    public function update_post(User $user,post $post){
        if($user->id == $post->section()->admin){
            return true;
        }
        return false;
    }


}
