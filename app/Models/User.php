<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\Role;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Validation\Rule;
use App\Models\Traits\StatusableTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, StatusableTrait;

    const STATUS_NORMAL = 0;
    const STATUS_PRIVATE = 1;
    const STATUS_BLOCK = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email', 'username', 'password', 'is_subscribe', 'status', 'gender', 'job', 'province', 'city', 'address', 'phone', 'github', 'facebook', 'twitter', 'linkedin'
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

    public static function validationRules($ignoreUserId = null)
    {
        $reservedUsername = implode(config('surabayadev.reserved_word'), ',');
        $rules = [
            'name' => 'required|min:2|max:50',
            'username' => 'required|min:2|max:50|unique:users|not_in:'. $reservedUsername,
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|string|min:6',
            'phone' => 'required',
            'province' => 'required',
            'city' => 'required',
            'address' => 'required'
        ];

        if ($ignoreUserId) {
            $rules['email'] = [
                'required',
                Rule::unique('users')->ignore($ignoreUserId),
            ];
            $rules['username'] = [
                'required',
                'not_in:'. $reservedUsername,
                Rule::unique('users')->ignore($ignoreUserId),
            ];
            $rules['password'] = 'string|min:6';
        }

        return $rules;
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

    public function scopeFilterable($q)
    {
        $status = request('status');
        $role = request('role');
        $search = request('search');
        return $q->where('role_id', '!=', 1)
            ->when(request()->has('status'), function ($q) use ($status) {
                if ($status == 'active') {
                    return $q->where('users.status', $status)->where('is_active', true);
                } elseif ($status == 'pending') {
                    return $q->where('users.status', $status)->where('is_active', false);
                } elseif ($status == 'block') {
                    return $q->where('users.status', self::STATUS_BLOCK);
                }
            })->when($role, function ($q) use ($role) {
                if ($role == 'member') {
                    return $q->where('users.role_id', Role::USER);
                } elseif ($role == 'organizer') {
                    return $q->where('users.role_id', Role::EDITOR);
                }
            })->when($search, function ($q) use ($search) {
                return $q->where(function ($qq) use ($search) {
                    $qq->where('name', 'LIKE', "%{$search}%")
                        ->orWhere('username', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%");
                });
            });
    }

    public function isAdmin()
    {
        return $this->role_id === Role::ADMIN;
    }
}
