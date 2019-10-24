<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name','hot','artist_id','author_id','user_id','genre_id','view','heart'];
    public function genres()
    {
        return $this->belongTo('App\Genre');
    }
    public function artists()
    {
        return $this->belongTo('App\Artist');
    }
    public function athours()
    {
        return $this->belongTo('App\Athour');
    }
    public function mylist_details()
    {
        return $this->belongTo('App\Mylist_detail');
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
