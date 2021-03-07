@extends('layouts.app')

@section('content')
<div class="col-md-7">
    <div class="info-wrapper">
        <h1>お知らせ</h1>
        <ul class="paling">
            <li><i class="fas fa-info-circle"></i> 自社販売サイト開設しました！ご利用お待ちしております！</li>
            <li><i class="far fa-lightbulb"></i> コーデュロイ生地などの新商品追加しました！</li>
            <li><i class="fas fa-ambulance"></i> サイトの不具合を修正しました。ご不便おかけして申し訳ありません！</li>
        </ul>
    </div>
    <hr>
    <div class="feature-wrapper">
        <h1>特集一覧</h1>
        <div id="carouselExampleIndicators" class="carousel slide main-slider" data-ride="carousel">
            <ol class="carousel-indicators">
                @for($i = 0; $i < count($special_features); $i++)
                    @if($i == 0)
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    @else
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                    @endif
                @endfor
            </ol>
            <div class="carousel-inner">
                @foreach($special_features as $key => $special_feature)
                    @if($key == 0)
                    <div class="carousel-item active">
                    @else
                    <div class="carousel-item">
                    @endif
                        <a href="{{ route('products.index', ['special_feature_id' => $special_feature->id, 'special_feature_name' => $special_feature->name]) }}">
                            <img class="d-block w-100" src="{{ $special_feature->img }}" alt="First slide">
                        </a>
                        <div class="carousel-caption d-none d-md-block slider-rem">
                            <h5>{{ $special_feature->name }}</h5>
                            <p>{{ $special_feature->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <hr>
    <div class="row products-wrapper">
        <h1 class="col-md-12">おすすめ商品</h1>
        <div class="col-md-4 item">
            <p class="products-img">
                <img src="{{ asset('img/dummy.jpg')}}">
            </p>
            <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
            <p class="text-right">560円</p>
        </div>
        <div class="col-md-4 item">
            <p class="products-img">
                <img src="{{ asset('img/dummy.jpg')}}">
            </p>
            <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
            <p class="text-right">560円</p>
        </div>
        <div class="col-md-4 item">
            <p class="products-img">
                <img src="{{ asset('img/dummy.jpg')}}">
            </p>
            <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
            <p class="text-right">560円</p>
        </div>
        <a class="text-right" href="#">もっと探す</a>
    </div>
    <hr>
    <div class="news-wrapper">
        <div class="row newproducts-wrapper">
            <hr>
            <h1 class="col-md-12">新商品</h1>
            @foreach($products as $product)
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ $product->top_img }}">
                </p>
                <p>{{ $product->name }}</p>
                <p class="text-right">{{ $product->price }}円</p>
            </div>
            @endforeach
            <a class="text-right" href="#">もっと探す</a>
        </div>
    </div>
    <hr>
    <div class="news-wrapper">
        <div class="row newprogucts-wrapper">
            <hr>
            <h1 class="col-md-12">作品展</h1>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>オリジナルバッグを作ってみました！</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>初めてのポーチ♪</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>服</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>バッグポーチズボン</p>
            </div>
            <a class="text-right" href="#">もっとみる</a>
        </div>
    </div>
</div>
@endsection