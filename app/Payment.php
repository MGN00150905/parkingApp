<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Car;
use App\Park;
use App\Card;

class Payment extends Model
{
    public function car(){
    	return $this->belongsTo('App\Car');
    }

    public function park(){
    	return $this->belongsTo('App\Park');
    }

    public function card(){
    	return $this->belongsTo('App\Card');
    }
}
