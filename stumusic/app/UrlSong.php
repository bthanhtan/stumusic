<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlSong extends Model
{
	protected $fillable = ['src', 'song_id',];
    public function song()
    {
    	return $this->belongTo('App\Song');
    }
}
