<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Park extends Model
{
    public function payments(){
    	return $this->hasMany('App\Payment');
    }
}
