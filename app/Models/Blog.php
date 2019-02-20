<?php

namespace App\Models;

use App\Models\User;
use App\Models\KategoriBlog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
	use SoftDeletes;

    protected $fillable = ['user_id','category_id', 'name', 'slug', 'title', 'image', 'content','editor_type'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getCategory(){
        return $this->hasMany('App\Models\KategoriBlog','id','category_id');
    }
    public function getUser(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
}
