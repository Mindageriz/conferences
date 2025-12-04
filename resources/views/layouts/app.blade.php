<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{__('messages.nav.conferences')}}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @yield('styles')
</head>
<body>
    @if(session('success'))
        <div id="flash-success" data-message="{{session('success')}}"></div>
    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">{{__('messages.conference.header')}}</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="langDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @if(App::isLocale('lt'))
                                {{__('messages.nav.language_lt')}}
                            @else
                                {{__('messages.nav.language_en')}}
                            @endif
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="langDropdown">
                            <li>
                                <a class="dropdown-item" href="{{route('locale.switch', 'en')}}">{{__('messages.nav.language_en')}}</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{route('locale.switch', 'lt')}}">{{__('messages.nav.language_lt')}}</a>
                            </li>
                        </ul>
                    </li>
                    @guest
                        <li class="nav-item">
                            <a href="/login" class="btn btn-outline-primary">{{__('messages.nav.login')}}</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="POST" style="display:inline;">
                                @csrf
                                <button class="btn btn-outline-danger">{{__('messages.nav.logout')}}</button>
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
