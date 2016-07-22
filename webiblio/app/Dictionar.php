<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionar extends Model
{
    public function __construct()
    {
    	return $this->belongsTo('App\Material');
    }
}
