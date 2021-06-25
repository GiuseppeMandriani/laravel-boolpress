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
}
