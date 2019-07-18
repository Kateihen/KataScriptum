<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::simplePaginate(15);

        return view('posts', ['posts' => $posts]);
    }

    public function show(Post $post)
    {
        return view('show', [
            'post' => $post,
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $attributes = $this->validatePost();

        $post = Post::create($attributes);

        return redirect('/posts/' . $post->id);
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        return view('edit', [
            'post' => $post]
        );
    }

    public function update(Post $post)
    {
        $post->update($this->validatePost());

        return redirect('/posts/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return redirect('/posts');
    }

    public function validatePost()
    {
        return \request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'author' => ['required', 'min:3', 'max:255'],
            'post_body' => ['required', 'min:10']
        ]);
    }
}
