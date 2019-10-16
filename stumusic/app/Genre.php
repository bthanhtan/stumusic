<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['country', 'type', ];
    public function song()
    {
    	return $this->hasMany('App\Song','song_id');
    }
}
