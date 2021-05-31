<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>This is Matthew Bulletin Board !</title>

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
</head>
<body>
<header class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/articles') }}">This is Matthew Bulletin Board !</a>
        <div class="my-navbar-control">
            @if(Auth::check())
                <span class="text-white">ようこそ, {{ Auth::user()->name }}さん</span>
                ｜
                <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <a class="my-navbar-item" href="#">Author</a>
                ｜
                <a class="my-navbar-item" href="http://127.0.0.1:8001/articles">home</a>
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

