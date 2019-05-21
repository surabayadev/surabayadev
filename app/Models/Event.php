<?php

namespace App\Models;

use App\Models\User;
use App\Models\EventPhoto;
use App\Models\Traits\StatusableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes, StatusableTrait;

    const STATUS_HIDE = 0;

    const STATUS_PUBLISH = 1;
    
    const PARTICIPANT_STATUS_PENDING = 0;
    const PARTICIPANT_STATUS_CONFIRM = 1;
    
    const PARTICIPANT_ROLE_MEMBER = 'member';
    const PARTICIPANT_ROLE_ORGANIZER = 'organizer';

    protected $fillable = ['user_id', 'name', 'slug', 'cover', 'city', 'address', 'description', 'content', 'status', 'participant_limit', 'ig_hashtag', 'ig_hashtag_status', 'start_date', 'end_date'];

    protected $dispatchesEvents = [
        'saving' => \App\Events\EventSaving::class
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class)->withPivot('status', 'role')->withTimestamps();
    }

    public function photos()
    {
        return $this->hasMany(EventPhoto::class);
    }

    public function getSpeakers()
    {
        return $this->participants->where('pivot.role', 'speaker')->all();
    }

    public function getMembers()
    {
        return $this->participants->where('pivot.role', 'member')->all();
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('defaultRelations', function ($q) {
            // $q->with('category');
        });
    }

    public function getIgHashtagStatuses()
    {
        return [
            // API will not fetch for this
            'idle',

            // API will looking for this
            'pending',

            // Indicates that API already done
            'success',

            // Indicates that API has been failed
            'failed',
        ];
    }

    public function scopeByPublish($q)
    {
        return $q->where('status', self::STATUS_PUBLISH);
    }

    public function scopeByHide($q)
    {
        return $q->where('status', self::STATUS_HIDE);
    }

    public function scopeIsIgFetchable($q)
    {
        return $q->whereNotNull('ig_hashtag')->where('ig_hashtag_status', 'pending');
    }

    public function scopeFilterable($q)
    {
        $status = request('status');
        $search = request('search');
        return $q->when(request()->has('status'), function ($q) use ($status) {
            return $q->where('events.status', $status);
        })->when($search, function ($q) use ($search) {
            return $q->where('name', 'LIKE', "%{$search}%");
        });
    }
}
