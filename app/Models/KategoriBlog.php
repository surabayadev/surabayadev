<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriBlog extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','slug', 'title', 'description'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function FunctionName($value='') {
        
    }
}
