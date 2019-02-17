<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    const ADMIN = 1;
    const EDITOR = 2;
    const USER = 3;

    protected $fillable = ['name', 'display_name', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
