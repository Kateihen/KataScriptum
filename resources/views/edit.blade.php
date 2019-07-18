@extends('layouts.layout')

@section('title', ': Edit Post')

@section('content')

    <h1 class="title">Edit Post</h1>

    <form method="POST" action="/posts/{{ $post->id }}">
        @method('PATCH')
        @csrf

        <div>
            Title:
            <br>
            <input type="text" name="title" value="{{ $post->title }}" required>
        </div>

        <div>
            Author:
            <br>
            <input type="text" name="author" value="{{ $post->author }}" required>
        </div>
        <div>
            Post:
            <br>
            <textarea name="post_body" required>{{ $post->post_body }}</textarea>
        </div>

        <div>
            <button type="submit">Update Post</button>
        </div>
    </form>

    <form method="POST" action="/posts/{{ $post->id }}">
        @method('DELETE')
        @csrf

        <div>
            <button type="submit">Delete Post</button>
        </div>
    </form>

@endsection