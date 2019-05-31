<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Post $post , User $user){

    	return view('Admin.dashboard', compact('post','user'));
    }
}
