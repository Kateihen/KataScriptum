@extends('layouts.layout')

@section('title', ": $post->title")

@section('content')

    <h1>{{ $post->title }}</h1>
    <h2>by {{ $post->author }}</h2>
    <p>{{ $post->post_body }}</p>

    @can('update', $post)
        <div>
            <a href="/posts/{{ $post->id }}/edit">Edit This Post</a>
        </div>

        <br>

        <div>
            <form method="POST" action="/posts/{{ $post->id }}">
                @method('DELETE')
                @csrf

                <div>
                    <button type="submit">Delete Post</button>
                </div>
            </form>
        </div>
    @endcan

@endsection