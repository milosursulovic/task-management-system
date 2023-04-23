<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
</head>

<body>
    @if (Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn" type="submit">Logout</button>
        </form>
    @endif
    <div class="container">
        @yield('container')
    </div>
</body>

</html>
