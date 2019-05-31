<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;

class HomeController extends Controller
{
    public function index(Post $posts)
    {
    	
        $posts = Post::all();
    	
    	return view('front.index',compact('posts'));
    }
}
