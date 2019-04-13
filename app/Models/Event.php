<?php

namespace App\Models;

use App\Models\User;
use App\Models\EventParticipant;
use App\Models\EventDocumentaion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
	use SoftDeletes;

    protected $fillable = ['user_id', 'name', 'pemateri', 'slug', 'cover', 'description', 'content', 'tanggal'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function participant()
    {
    	return $this->hasMany(EventParticipant::class);
    }

    public function documentation()
    {
        return $this->hasMany(EventDocumentaion::class);
    }

    public function FunctionName($value='') {
        // code...
    }
}
