<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mylist extends Model
{
    protected $fillable = ['name'];
    public function mylist_details()
    {
    	return $this->hasMany('App\Mylist_Detail','mylist_detail_id');
    }
}
