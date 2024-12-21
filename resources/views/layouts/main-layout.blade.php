<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @vite('public/css/style.css')
</head>

<body>
    <header>
        <h1>My Music Review</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="{{route('artists')}}">Artists</a></li>
                <li><a href="{{route('reviews')}}">Reviews</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
    </header>
    <div class="separator"></div>

    @yield('content')

    <footer>
        <p>&copy; 2024 My Music Review</p>
    </footer>
</body>

</html>
