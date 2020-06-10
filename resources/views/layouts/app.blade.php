<!doctype html>
<html lang="sk">

<head>
    <meta charset="utf-8">
    <title>The Sneaker Store | @yield('title')</title>
    <meta name="description" content="Best deals in sneaker">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/ico/safari-pinned-tab.svg" color="#d81f26">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="The Sneaker Store">
    <meta name="application-name" content="The Sneaker Store">
    <meta name="msapplication-TileColor" content="#d81f26">
    <meta name="msapplication-config" content="/ico/browserconfig.xml">
    <meta name="theme-color" content="#D81F26">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/fonts.css">

    <script type="text/javascript" src="/js/jquery.js"></script>
</head>

<body>
@include('includes.header')

@include('includes.menu')

@if(Request::is('/'))
    @include('includes.banner')
@endif

<main>
    @yield('content')
</main>

@include('includes.footer')

@include('includes.login')

@include('includes.summary')

@if(Session::has('message'))
    <div id="message">
        <p>{{Session::get('message')}}</p>
    </div>
    <script>
        setTimeout(function() {
            $('#message').fadeOut('fast');
        }, 1000);
    </script>
@endif
<script type="text/javascript" src="/js/app.js"></script>
</body>

</html>
