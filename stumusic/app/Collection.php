<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $fillable = ['name', 'country', 'type', ];
    public function song()
    {
    	return $this->hasMany('App\Song','song_id');
    }
}
