<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\{CreatePostRequest, UpdatePostRequest};

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
    	$posts = Post::with('user')
            ->orderBy('updated_at', 'DESC')
            ->paginate(10);

    	return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
    	return view('posts.show', compact('post'));
    }

    public function create()
    {
    	return view('posts.create');
    }

    public function store(CreatePostRequest $request)
    {
        $post = new Post;
        $post->fill(
            $request->only('title', 'description', 'url')
        );
        $post->user_id = auth()->user()->id;
        $post->save();

        session()->flash('message', 'Post Created!');

        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        if ($post->user_id != \Auth::user()->id) {
            return redirect()->route('posts.index');            
        }
        
        return view('posts.edit', compact('post'));
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->only('title', 'description', 'url'));

        session()->flash('message', 'Post Updated!');

        return redirect()->route('posts.show', compact('post'));
    }

    public function delete(Post $post)
    {
        if ($post->user_id != \Auth::user()->id) {
            return redirect()->route('posts.index');            
        }

        $post->delete();

        session()->flash('message', 'Post Deleted!');

        return redirect()->route('posts.index');
    }
}
