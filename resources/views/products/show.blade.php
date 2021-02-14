@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-md-7">
        <div>
            <h2>商品名：はりねずみとキノコ★綿麻プリント生地５色★</h2>
        </div>
        <div class="products-show-slider">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"  data-interval="10000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('img/dummy.jpg')}}" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/dummy.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('img/dummy.jpg')}}" alt="Third slide">
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
        <div class="slider-list">
            <ol class="row">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="col-md-2 active"><p class="carousel-img"><img src="{{ asset('img/dummy.jpg')}}" alt="1"></p></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="col-md-2"><p class="carousel-img"><img src="{{ asset('img/dummy.jpg')}}" alt=""></p></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="col-md-2"><p class="carousel-img"><img src="{{ asset('img/dummy.jpg')}}" alt=""></p></li>
            </ol>
        </div>
        <div class="products-description">
            <div class="row">
                <p class="col-md-2">商品紹介：</p>
                <p class="col-md-10">
                    キノコのお庭でハリネズミがおにごっこ♪<br>
                    厚みは、少し厚めで、バックやインテリア、小物作りに最適です！！<br>
                    地色は、５色あって、生成り（１枚目の画像）・紺（２枚目の画像）・からし（３枚目の画像）・ピンク（４枚目の画像）・ダークグリーン（５枚目の画像）です。
                </p>
            </div>
            <div class="row">
                <p class="col-md-2">価格：</p>
                <p class="col-md-10">50円</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        @component('components.rightsidebar')
        @endcomponent
    </div>
</div>

@endsection