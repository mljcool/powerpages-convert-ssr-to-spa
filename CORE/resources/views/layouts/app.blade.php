<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My Laravel App')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <header>
        <h1>My App</h1>
        <nav>
            <a href="/">Home</a> |
            <a href="/about">About</a> |
            <a href="/contact">Contact</a>
        </nav>
    </header>

    <hr>

    <main>
        @yield('content')
    </main>

    <hr>

    <footer>
        <p>&copy; {{ date('Y') }} My Laravel App</p>
    </footer>

</body>
</html>
