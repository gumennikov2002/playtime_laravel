<html>
<head>
    <title>PlayTime!</title>
    <link rel="shortcut icon" href="/img/fav.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="HandheldFriendly" content="true"/>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/wickedcss.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<header class="container">
    <div class="container d-flex justify-content-between">
        <h1 class="stroked floater"><a href="/">
            <img src="/img/logo.png" id="logo" alt="" ondragstart="return false">
        </a></h1>
        @if ( isset($user) )
            <div class="text-light pt-3">
                <a class="text-light stroked" href="{{ route('lk') }}">{{ $user['nickname'] }}</a>
                |
                <a class="text-light stroked" href="{{ route('logout') }}">Выйти</a>
            </div>
        @else
            <div class="text-light pt-3">
                <a class="text-light stroked" href="{{ route('reg_page') }}">Регистрация</a>
                |
                <a class="text-light stroked" href="{{ route('login_page') }}">Войти</a>
            </div>
        @endif
    </div>
</header>

<div class="container container-custom" id="app">
    @yield('content')
    <div class="pb-5"></div>
</div>

<footer class="container">
    <div class="text-light text-center">PlayTime © 2022</div>
</footer>

<script src="/js/fontawesome.js"></script>
<script src="/js/axios.js"></script>
@yield('scripts')
</body>
</html>
