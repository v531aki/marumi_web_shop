@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-md-7">
        <div class="info-wrapper">
            <h1>お知らせ</h1>
            <ul class="info">
                <li><i class="fas fa-info-circle"></i> 自社販売サイト開設しました！ご利用お待ちしております！</li>
                <li><i class="far fa-lightbulb"></i> コーデュロイ生地などの新商品追加しました！</li>
                <li><i class="fas fa-ambulance"></i> サイトの不具合を修正しました。ご不便おかけして申し訳ありません！</li>
            </ul>
        </div>
        <div class="feature-wrapper">
            <hr>
            <h1>特集一覧</h1>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('img/dummy.jpg')}}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block slider-rem">
                            <h5>textextexttextextexttextextext</h5>
                            <p>hogehogehogehogehogehoge</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/dummy.jpg')}}" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block slider-rem">
                            <h5>textextexttextextexttextextext</h5>
                            <p>hogehogehogehogehogehoge</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/dummy.jpg')}}" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block slider-rem">
                            <h5>textextexttextextexttextextext</h5>
                            <p>hogehogehogehogehogehoge</p>
                        </div>
                    </div>
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
        
        <div class="row Recommend-wrapper">
            <hr>
            <h1 class="col-md-12">おすすめ商品</h1>
            <div class="col-md-4 item">
                <p class="recommend-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-4 item">
                <p class="recommend-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-4 item">
                <p class="recommend-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <a class="text-right" href="#">もっと探す</a>
            
            <div class="row newprogucts-wrapper">
                <hr>
                <h1 class="col-md-12">新商品</h1>
                <div class="col-md-3 item">
                    <p class="recommend-img">
                        <img src="{{ asset('img/dummy.jpg')}}">
                    </p>
                    <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                    <p class="text-right">560円</p>
                </div>
                <div class="col-md-3 item">
                    <p class="recommend-img">
                        <img src="{{ asset('img/dummy.jpg')}}">
                    </p>
                    <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                    <p class="text-right">560円</p>
                </div>
                <div class="col-md-3 item">
                    <p class="recommend-img">
                        <img src="{{ asset('img/dummy.jpg')}}">
                    </p>
                    <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                    <p class="text-right">560円</p>
                </div>
                <div class="col-md-3 item">
                    <p class="recommend-img">
                        <img src="{{ asset('img/dummy.jpg')}}">
                    </p>
                    <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                    <p class="text-right">560円</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        @component('components.rightsidebar')
        @endcomponent
    </div>
</div>

@endsection