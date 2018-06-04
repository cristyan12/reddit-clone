<?php

Route::view('/dashboard', 'dashboard');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'PostsController@index')->name('home');
	Route::get('posts/create', 'PostsController@create')->name('posts.create');
	Route::post('/', 'PostsController@store')->name('posts.store');
	Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
	Route::put('/posts/{post}', 'PostsController@update')->name('posts.update');
	Route::delete('/posts/{post}/delete', 'PostsController@delete')->name('posts.delete');
	
	Route::post('posts/{post}/comment', 'CommentController@store')->name('comments.store');
});


Route::get('/', 'PostsController@index');
Route::get('/', 'PostsController@index')->name('posts.index');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');