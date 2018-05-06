<?php

Route::get('/posts', [
	'uses' => 'PostsController@index',
	'as' => 'posts.index'
]);

Route::get('posts/create', [
	'uses' => 'PostsController@create',
	'as' => 'posts.create'
]);

Route::name('posts.store')->post('/posts', 'PostsController@store');

Route::get('/posts/{post}', [
	'uses' => 'PostsController@show',
	'as' => 'posts.show'
]);
