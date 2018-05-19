<?php

Route::get('/master', function() {
	return view('layouts._master');
});

Route::get('/', 'PostsController@index')->name('posts.index');
Route::get('posts/create', 'PostsController@create')->name('posts.create');
Route::post('/', 'PostsController@store')->name('posts.store');
Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts/{post}/edit', 'PostsController@edit')->name('posts.edit');
Route::put('/posts/{post}', 'PostsController@update')->name('posts.update');
Route::delete('/posts/{post}/delete', 'PostsController@delete')->name('posts.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');