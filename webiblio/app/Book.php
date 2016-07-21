<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function __construct()
    {
    	return $this->belongsTo('App\Material');
    }
}
