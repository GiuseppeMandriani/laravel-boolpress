<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{

    /**
    *   Archivio, GET POSTS BLOG
    */

    public function index(){

        // $posts = Post::all();

        $posts = Post::paginate(5);
        return response()->json($posts);
    }


    /**
     *  GET POST DETAIL BY SLUG
     */

    public function show($slug){
        // dump($slug);

                                            // Con with unisco caratteristiche di category e tags 
        $post = Post::where('slug',$slug)->with(['category', 'tags'])->first(); 

        return response()->json($post);
    }
}
