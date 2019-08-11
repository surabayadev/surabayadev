<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    const STATUS_HIDE = 0;
    
    const STATUS_PUBLISH = 1;

    protected $fillable = ['user_id', 'name', 'email', 'job', 'content', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
