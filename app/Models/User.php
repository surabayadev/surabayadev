<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
}
