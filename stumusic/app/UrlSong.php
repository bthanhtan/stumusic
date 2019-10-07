<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UrlSong extends Model
{
	protected $fillable = ['url','song_id',];
    public function url_table()
    {
    	return $this->morphTo();
    }
}
