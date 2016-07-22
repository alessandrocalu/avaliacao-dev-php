<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public function authors()
    {
		return $this->belongsToMany('App\Author', 'material_author');
    }
}
