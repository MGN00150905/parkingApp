<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Car extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }

    public function payments(){
    	return $this->hasMany('App\Payment');
    }
}
