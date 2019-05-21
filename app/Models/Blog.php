<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use App\Models\Traits\StatusableTrait;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use StatusableTrait;

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

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('defaultRelations', function ($q) {
            $q->with('category');
        });
    }

    public function scopeByPublish($q)
    {
        return $q->where('status', self::STATUS_PUBLISH);
    }

    public function scopeByHide($q)
    {
        return $q->where('status', self::STATUS_HIDE);
    }

    public function scopeFilterable($q)
    {
        $status = request('status');
        $search = request('search');
        return $q->when($status, function ($q) use ($status) {
            return $q->where('blogs.status', $status);
        })->when($search, function ($q) use ($search) {
            return $q->where('title', 'LIKE', "%{$search}%");
        });
    }
}
