<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    protected $fillable = [
        'id_event',
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
        return $this->belongsTo(Event::clas, 'id_event');
    }
    
}
