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

    protected $fillable = ['user_id', 'name', 'slug', 'cover', 'description', 'content', 'status', 'participant_limit'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
