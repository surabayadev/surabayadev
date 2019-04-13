<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class EventDocumentaion extends Model
{
    protected $fillable = [
        'event_id',
        'photo'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
