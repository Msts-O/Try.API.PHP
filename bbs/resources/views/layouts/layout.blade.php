<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>What's is the news ?</title>
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>
<body>
<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('articles') }}">
           What's is the news ?
        </a>
        <div class="my-navbar-control">
            @if(Auth::check())
                <span class="text-white">ようこそ, {{ Auth::user()->name }}さん</span>
                ｜
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="my-navbar-item" href="{{ url('articles') }}">Author</a>
           　　　&nbsp;
                <a class="my-navbar-item" href="{{ url('articles') }}">home</a>
            @endif
        </div>
    </div>
</header>

<div>
    @yield('content')
</div>

@if(Auth::check())
    <script>
        document.getElementById('logout').addEventListener('click',function(event){
            event.preventDefault();
            document.getElementById('logout-form').submit();
        });
    </script>
@endif

</body>
</html>
