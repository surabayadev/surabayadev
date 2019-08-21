<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name', 'slug', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public static function getDropdown()
    {
        return self::orderBy('name', 'asc')
            ->get()
            ->pluck('name', 'id')
            ->toArray();
    }
}