<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('tile', 'web perpustakaan')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav>
        <div class="nav-inner">
            <a href="" class="nav-logo">
                <span class="icon">📚</span>
                <span>Web Perpustakaan</span>
            </a>
                <div class="nav-links">
                    <a href="{{ route('books.index') }}" class="{{ request()->routeIs('books.index') ? 'active' : '' }}">Beranda</a>
                    @auth
                        <a href="" class="{{ request()->routeIs('my-books.index') ? 'active' : '' }}">Buku Saya</a>
                        <div class="nav-user">
                            <span>{{ Auth::user()->name }}</span>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-secondary btn-sm btn-logout">Logout</button>
                            </form>
                            @else
                            <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                            <a href="{{ route('register') }}" class="btn-nav">Register</a>
                            @endauth
                        </div>
                    
        </div>
    </nav>
    <main>
        @if(session('success'))
            <div class="alert alert-success">
               👍 {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-error">
                👎 {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </main>

    <footer>
        <strong>© 2023 Web Perpustakaan. All rights reserved.   @endash; library digital &copy;{{ date('Y') }}</strong>
    </footer>
</body>
</html>