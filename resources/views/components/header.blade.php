<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'marumi') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
        </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row">
        <ul class="top-wrapper col-md-12 col-lg-10 offset-lg-1" id="nav">
            <li class="col-md-2"><a href="{{ url('/') }}">店舗TOP</a></li>
            <li class="col-md-2"><a href="{{ url('/products') }}">生地一覧</a></li>
            <li class="col-md-2"><a href="{{ url('/sewpad') }}">掲示板</a></li>
            <li class="col-md-2"><a href="#">まるみ</a></li>
            @guest
                <li class="col-md-2">
                    <a href="{{ route('login') }}">ログイン</a>
                </li>
                @if (Route::has('register'))
                    <li class="col-md-2">
                        <a href="{{ route('register') }}">新規登録</a>
                    </li>
                @endif
            @else
                <li class="col-md-2"><a href="#">マイページ</a></li>
                <li class="col-md-2">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        ログアウト
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</div>