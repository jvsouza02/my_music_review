<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    @vite('resources/css/app.css')
    @vite('public/css/style.css')
</head>

<body>
    <header>
        <h1>My Music Review</h1>
        <nav>
            <ul class="text-lg">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('artists')}}">Artists</a></li>
                <li><a href="{{route('reviews')}}">Reviews</a></li>
                <li><a href="{{route('home')}}#about">About</a></li>
            </ul>
        </nav>
    </header>
    <div class="separator"></div>

    @yield('content')

    <footer>
        <p>&copy; 2024 My Music Review</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    @vite('public/js/script.js')
</body>

</html>
