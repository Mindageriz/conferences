<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferences</title>

    <!-- stiliai veliau -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Conferences</a>
            <div>
                @guest
                    <a href="/login" class="btn btn-outline-primary">Log in</a>
                @endguest
                @auth
                    <form action="{{route('logout')}}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-outline-danger">Log out</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
