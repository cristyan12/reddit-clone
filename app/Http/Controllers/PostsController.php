<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePostRequest;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('id', 'DESC')->get();

    	return view('posts.index')->with('posts', $posts);
    }

    public function show(Post $post)
    {
    	return view('posts.show')->with('post', $post);
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        Post::create($request->only('title', 'description', 'url'));

        return redirect()->route('posts.index');
    }
}
