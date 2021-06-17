<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // FILLABLE 
    
    protected $fillable = [
        'title',
        'slug', 
        'content',
    ];
}
