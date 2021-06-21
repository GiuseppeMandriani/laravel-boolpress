<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
        protected $fillable = [
        'name',
        'slug',      // Aggiornato dopo  la relazione
    ];


    /**
     * RELAZIONE CON POSTS
     * categories-posts
     */

    // Scenario più relazioni

    public function posts(){    // la categoria può essere assegnata a più post


        return $this->hasMany('App\Post');  // NameSpace Model con cui si ha la relazione
    }
}
