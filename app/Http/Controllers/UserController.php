<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $users)
    {
        $users = User::all();
        return view('Admin.Users.index', compact('users'));
    }

    public function show($id)
    {
        $posts = Post::where('user_id', $id)->get();
        $user = User::where('id',$id)->first();
        return view('Admin.Users.details', compact('orders','user'));
    }
}
