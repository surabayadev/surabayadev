<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;

    const STATUS_HIDE = 0;

    const STATUS_PUBLISH = 1;
    
    const PARTICIPANT_STATUS_PENDING = 0;
    const PARTICIPANT_STATUS_CONFIRM = 1;
    
    const PARTICIPANT_ROLE_MEMBER = 'member';
    const PARTICIPANT_ROLE_ORGANIZER = 'organizer';

    protected $fillable = ['user_id', 'name', 'slug', 'cover', 'description', 'content', 'status', 'participant_limit'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)->withPivot('status', 'role')->withTimestamps();
    }
}
