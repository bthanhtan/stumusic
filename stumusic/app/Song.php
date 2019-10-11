<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name','hot','singer_id','musician_id','user_id','type','view','heart'];
    public function collection()
    {
    	return $this->belongTo('App\Collection');
    }
    public function urlsongs()
    {
        return $this->hasOne('App\UrlSong');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
