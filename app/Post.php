<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // FILLABLE 
    
    protected $fillable = [
        'title',
        'category_id',      // Aggiornato dopo  la relazione
        'slug', 
        'pubblication_date',
        'content',
    ];



    /**
     *  RELAZIONE CON CATEGORIES
     *  posts-categories
     */

    public function category(){     // il post ha una sola categoria

        // Scenario 1 relazione
        
        return $this->belongsTo('App\Category');    // Name Space Model con cui si ha relazione

    }




}
