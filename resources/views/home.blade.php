@extends('layouts.layout')

@section('title', ': Home')

@section('content')

<div>
    <h2>Posts by {{ $user->name }}</h2>

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

    <div>
    </div>

</div>
@endsection
