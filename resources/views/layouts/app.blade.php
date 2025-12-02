<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conferences</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
    @if(session('success'))
        <div id="flash-success" data-message="{{session('success')}}"></div>
    @endif
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">Conferences</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item">
                            <a href="/login" class="btn btn-outline-primary">Log in</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-outline-danger">Log out</button>
                            </form>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>
