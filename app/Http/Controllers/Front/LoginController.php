<?php

namespace App\Http\Controllers\Front;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /* public function __construct()
	{
		$this->middleware('guest')->except('logout');
	} */

    public function index()
    {
    	return view('front.login.index');
    }

    public function store(Request $request)
    {
    	 $request->validate([
    		'email'=>'required|email',
    		'password'=>'required'
    		 ]);

    	$data = Request(['email','password']);
            
    	if(!Auth::attempt($data)){
    		return back()->withErrors([ 
    			'message'=>'Wrong Credintials Please Try Again'
    		]);
    	}
        
    	return redirect('/');
    }

    public function logout( )
    {
        auth()->logout();

        session()->flash('msg', 'You Have been Successfully Logged out');

        return redirect('/user/login');

    }
}
