<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
    *   RELAZIONE CON POST 
    *   posts-tags  Relazione many to many 
    */

    public function posts(){
        return $this->belongsToMany('App\Post') ;  //Name space Model 
    }
}
