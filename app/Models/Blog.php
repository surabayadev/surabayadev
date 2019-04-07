<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    const STATUS_HIDE = 0;

    const STATUS_PUBLISH = 1;

    protected $fillable = ['user_id', 'category_id', 'title', 'slug', 'cover', 'excerpt', 'content', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
