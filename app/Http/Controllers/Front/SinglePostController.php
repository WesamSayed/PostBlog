<?php

namespace App\Http\Controllers\Front;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class SinglePostController extends Controller
{
     public function index($id , User $user)
    {
    	$user = User::all();
        $posts = Post::find($id);
    	return view('front.post',compact('posts','user'));
    }
    
}
 
