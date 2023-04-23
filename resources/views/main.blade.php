<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @if (Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="inner-logout">
                <h3>{{ Auth::user()->email }}</h3>
                <button class="btn" type="submit">Logout</button>
            </div>
        </form>
    @endif
    <div class="container">
        @yield('container')
    </div>
</body>

</html>
