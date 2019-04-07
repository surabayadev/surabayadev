<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Role;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable;

    const STATUS_NORMAL = 0;
    const STATUS_PRIVATE = 1;
    const STATUS_BLOCK = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at', 'updated_at', 'deleted_at', 'is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('role', function (Builder $builder) {
            $builder->with('role');
        });
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function participants()
    {
        return $this->belongsToMany(Event::class)->withPivot('status', 'role')->withTimestamps();
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function setRoleIdAttribute($value)
    {
        $this->attributes['role_id'] = $value ?: Role::ROLE_USER;
    }

    public function scopeByRole($query, $role_id)
    {
        if (is_array($role_id)) {
            return $query->whereIn('users.role_id', $role_id);
        }
        return $query->where('users.role_id', $role_id);
    }

    public function scopeByEditor($query)
    {
        return $query->where('users.role_id', Role::EDITOR);
    }

    public function scopeByMember($query)
    {
        return $query->where('users.role_id', Role::USER);
    }

    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->where('is_active', 1)->where('status', self::STATUS_NORMAL);
        });
    }
}
