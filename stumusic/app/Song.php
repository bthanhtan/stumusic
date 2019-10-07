<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name','image','hot','singer_id','musician_id','user_id','type','view','heart'];
    public function collection()
    {
    	return $this->belongTo('App\Collection');
    }
    public function urlSong()
    {
        return $this->morphMany(Image::class, 'url_table');
    }
    
}
