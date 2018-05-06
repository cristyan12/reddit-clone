<?php

Route::get('/posts', [
	'uses' => 'PostsController@index',
	'as' => 'posts.index'
]);

Route::get('/posts/{post}', [
	'uses' => 'PostsController@show',
	'as' => 'posts.show'
]);


