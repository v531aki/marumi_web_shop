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
    <script src="https://kit.fontawesome.com/1145831153.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/marumi.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        @component('components.header')
        @endcomponent
    </header>
    <div class="row">
        <main class="col-md-12 col-lg-10 offset-lg-1">
            <div class="row">
                <div class="col-md-2">
                    @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
                    @endcomponent
                </div>
                @yield('content')
                <div class="col-md-3">
                    @component('components.rightsidebar', ['rankings' => $rankings])
                    @endcomponent
                </div>
            </div>
        </main>
    </div>
    <footer>
        @component('components.footer')
        @endcomponent
    </footer>
</body>
</html>
