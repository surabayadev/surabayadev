<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    const STATUS_HIDE = 0;
    
    const STATUS_PUBLISH = 1;

    protected $fillable = ['user_id', 'name', 'email', 'job', 'avatar', 'content', 'status'];

    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getNameAttribute()
    {
        return $this->user ? $this->user->name : $this->attributes['name'];
    }
    
    public function getEmailAttribute()
    {
        return $this->user ? $this->user->email : $this->attributes['email'];
    }
    
    public function getJobAttribute()
    {
        return $this->user ? $this->user->job : $this->attributes['job'];
    }

    public function getAvatarAttribute()
    {
        return $this->user ? avatar($this->user) : $this->attributes['avatar'];
    }

    public function offsetGet($key)
    {
        $haystack = ['name', 'username', 'email', 'job'];
        if (in_array($key, $haystack) && $this->user) {
            return $this->user->{$key};
        }

        return $this->{$key};
    }
}
