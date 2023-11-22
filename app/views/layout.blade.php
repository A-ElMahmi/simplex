<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <script defer src="/js/script.js"></script>

    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/hello">Hello</a></li>
            <li><a href="/login">Login</a></li>
        </ul>
    </nav>

    @yield('content')
</body>
</html>