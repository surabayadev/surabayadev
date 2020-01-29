<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserSocial extends Model
{
    protected $table = 'user_socials';

    protected $fillable = ['user_id', 'provider', 'provider_id', 'email', 'avatar', 'token'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
