@extends('layouts.layout')

@section('title', ': Posts')

@section('content')

    <h1>Posts</h1>
    @foreach($posts as $post)
        <ul>
            <li>
            
                <h4>{{ $post->title }}</h4> by 
                <b>{{ $post->author }}</b>
                <br>
                <div>
                    <br>
                    "{{ str_limit($post->post_body, $limit = 50, $end = '...') }}"
                    <a href="/posts/{{ $post->id }}">Read more</a>
                <div>
            </li>
        </ul>
    @endforeach

    {{ $posts->links() }}

@endsection