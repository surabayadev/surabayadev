<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $fillable = [
        'event_id',
        'email',
        'nama_lengkap',
        'notelp',
        'status',
        'asal_institusi',           
        'id_telegram',
        'sumber_info'    
    ];
    
    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }
    
}
