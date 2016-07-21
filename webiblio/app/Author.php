<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function __construct()
    {
        return $this->belongsToMany('App\Material', 'material_author');
    }
}
