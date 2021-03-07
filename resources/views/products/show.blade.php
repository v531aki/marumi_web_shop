@extends('layouts.app')

@section('content')
<div class="main-wrapper col-md-7">
    <div>
        <h2>商品名：{{ $product->name }}</h2>
    </div>
    <div class="products-show-slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel"  data-interval="10000">
            <div class="carousel-inner">
                @for($i = 0; $i < count($imgs); $i++)
                @if($i == 0)
                <div class="carousel-item active">
                @else
                <div class="carousel-item">
                @endif
                    <img class="d-block w-100" src="{{ $imgs[$i] }}" alt="First slide">
                </div>
                @endfor
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
            @for($i = 0; $i < count($imgs); $i++)
                @if($i == 0)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="col-md-2 active">
                @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}" class="col-md-2">
                @endif
                    <p class="carousel-img"><img src="{{ $imgs[$i] }}" alt="画像"></p>
                </li>
            @endfor
        </ol>
    </div>
    <div class="products-description">
        <div class="row">
            <p class="col-md-2">商品紹介：</p>
            <p class="col-md-10">
                {{ $product->description }}
            </p>
        </div>
        <div class="row">
            <p class="col-md-2">価格：</p>
            <p class="col-md-10">{{ $product->price }}円</p>
        </div>
        <div class="row">
            <p class="col-md-2">在庫数：</p>
            <p class="col-md-10">{{ $product->stock }}(単位：10cm)</p>
        </div>
    </div>
    <div class="order-form">
        @auth
        <form method="POST" action="{{route('carts.store')}}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="POST">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="img" value="{{ $product->top_img }}">
            <div class="form-group row">
                <label for="quantity" class="col-md-2">数量：</label>
                <div class="col-sm-10">
                    <input type="number" id="quantity" name="qty" min="1" max="{{ $product->stock }}" value="{{ $product->moq }}" class="form-control w-25">
                </div>
            </div>
            <input type="hidden" name="weight" value="0">
            <div class="row">
                <div class="col-7">
                    <button type="submit" class="btn samazon-submit-button w-100">
                        <i class="fas fa-shopping-cart"></i>
                        カートに追加
                    </button>
                </div>
                <div class="col-5">
                    @if(true)
                    <a href="#" class="btn samazon-favorite-button text-favorite w-100">
                        <i class="fa fa-heart"></i>
                        お気に入り解除
                    </a>
                    @else
                    <a href="#" class="btn samazon-favorite-button text-favorite w-100">
                        <i class="fa fa-heart"></i>
                        お気に入り
                    </a>
                    @endif
                </div>
            </div>
        </form>
        @endauth
    </div>
</div>
@endsection