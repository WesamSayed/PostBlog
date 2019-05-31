<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterationController extends Controller
{
    public function index()
    {
    	return view('front.registeration.index');
    }

    public function store(Request $request)
    {
    	 $request->validate([
    		'name'=>'required',
    		'email'=>'required|email',
    		'password'=>'required|confirmed',
    		'phone'=>'required'
        ]);

    	$user = User::create([
    		'name'=>$request->name,
    		'email'=>$request->email,
    		'password'=>$request->password,
    		'phone'=>$request->phone,
    	]);

    	auth()->login($user);

    	return redirect('/');
    }
}
