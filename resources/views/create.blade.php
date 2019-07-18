@extends('layouts.layout')

@section('title', ': Create')

@section('content')

    <h1>Create a New Post</h1>

    <form method="POST" action="/posts">
        @csrf

        <div>
            Title:
            <br>
            <input type="text" name="title" placeholder="Post Title" value="{{ old('title') }}">
        </div>

        <div>
            Author:
            <br>
            <input type="text" name="author" value="{{ Auth::user()->name }}">
        </div>

        <div>
            Post:
            <br>
            <textarea name="post_body" placeholder="Post body" required>{{ old('post_body') }}</textarea>
        </div>

        <div>
            <button type="submit">Create Post</button>
        </div>

        @if ($errors->any())

            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        @endif

    </form>

@endsection