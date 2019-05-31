<?php

Route::prefix('admin')->group(function(){

	Route::middleware('auth:admin')->group(function(){

		// Dashboard

		Route::get('/','DashboardController@index');

		// POST

		Route::resource('/posts','PostController');

		// Users

		Route::resource('/users','UserController'); 
		Route::get('/logout','AdminUserController@logout');

	});

	// Admin Login
	Route::get('/login', 'AdminUserController@index')->name('login');
	Route::post('/login', 'AdminUserController@store');
	

});
// Front Post
Route::get('/', 'Front\HomeController@index');
Route::get('/singlepost/{post}', 'Front\SinglePostController@index');
Route::post('/singlepost', 'Front\SinglePostController@store');

Route::post('/post/comments','CommentsController@store')->name('addComment');

//Resgiser
Route::get('/user/register','Front\RegisterationController@index');
Route::post('/user/register','Front\RegisterationController@store');

//Login

Route::get('/user/login','Front\LoginController@index');
Route::post('/user/login','Front\LoginController@store');

//Logout
Route::get('/user/logout','Front\LoginController@logout');


/* Route::get('admin', function () {
    return view('Admin.dashboard');
}); */