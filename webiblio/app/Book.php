<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function material()
    {
    	return $this->belongsTo('App\Material');
    }
}
