<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/marumi.css')}}" rel="stylesheet">

    <script src="https://kit.fontawesome.com/3723f06c66.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        @component('components.dashboard.header')
        @endcomponent
    </header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                @component('components.dashboard.sidebar')
                @endcomponent
            </div>
            <div class="col-10">
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>