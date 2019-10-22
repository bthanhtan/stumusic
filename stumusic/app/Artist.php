<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name', 'content', 'follow', 'song_id'];
    public function songs()
    {
    	return $this->hasMany('App\Song','song_id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
