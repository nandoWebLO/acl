<?php

namespace App\Policies;

use App\User;
use App\Notice;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoticePolicy
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

    public function updateNotice(User $user, Notice $notice){
        return $user->id == $notice->user_id;
    }

    public function before(User $user){
        $user->name == 'Fernando';
    }
}
