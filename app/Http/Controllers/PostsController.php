<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\{CreatePostRequest, UpdatePostRequest};

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::orderBy('updated_at', 'DESC')->paginate(10);

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

    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->only('title', 'description', 'url'));

        return redirect()->route('posts.show', compact('post'));
    }

    public function delete(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
            ->with('danger', 'Post deleted successfully');
    }
}
