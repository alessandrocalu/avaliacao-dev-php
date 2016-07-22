<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function __construct()
    {
		return $this->belongsToMany('App\Author', 'material_author');
    }
}
