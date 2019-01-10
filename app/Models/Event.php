<?php

namespace App\Models;

use App\Models\User;
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

    public function FunctionName($value='') {
        // code...
    }
}
