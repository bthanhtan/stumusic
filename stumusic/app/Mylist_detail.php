<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mylist_detail extends Model
{
    protected $fillable = ['mylist_id', 'song_id'];
    public function songs()
    {
    	return $this->hasMany('App\Song','song_id');
    }
    public function mylists()
    {
        return $this->belongTo('App\Mylist');
    }
}
