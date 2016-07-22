<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //
    public function __construct()
    {
    
    }

    public function calcula_notacao($nome){
    	return strtoupper(substr(trim($nome), 0, 3));
    }
}
