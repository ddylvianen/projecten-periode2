<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header>
        <h1>Welcome to FitForFun</h1>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <p>&copy; 2023 FitForFun. All rights reserved.</p>
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>