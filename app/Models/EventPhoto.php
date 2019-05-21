<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class EventPhoto extends Model
{
    protected $table = 'event_photos';

    protected $fillable = ['original', 'thumbnail', 'provider', 'source_link'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
