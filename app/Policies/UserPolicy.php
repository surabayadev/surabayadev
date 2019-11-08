<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function join(User $user, Event $event)
    {
        $participants = $event->participants;
        return $participants->where('id', $user->id)->count();
    }
}
