<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KataScriptum @yield('title')</title>
</head>

<body>
    <div>
        @yield('content')

        <ul>
            <li><a href="/">Main</a></li>
            <li><a href="/posts">Posts</a></li>

    @if(Auth::check())

            <li><a href="/home">My Posts</a>
            <li><a href="/posts/create">Create a New Post</a></li>
        </ul>

    </div>

    <div>
        <form action="/logout" method="POST">
            @csrf
            <button value="submit">Logout</button>
        </form>
    </div>

    @endif

    @if(!Auth::check())

        <a href="/register"><h3>Register</h3></a>

        <h2>Have an account?</h2>
        <a href="/login"><h3>Login</h3></a>

    @endif

</body>
</html>