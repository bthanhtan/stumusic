<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $fillable = ['name', 'image', 'content', 'follow', 'song_id'];
    public function song()
    {
    	return $this->hasMany('App\Song','song_id');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
