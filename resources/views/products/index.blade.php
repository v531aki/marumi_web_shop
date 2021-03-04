@extends('layouts.app')

@section('content')
<div class="main-wrapper col-md-7">
    <div class="container">
        <a href="/">トップ</a> > <a href="/products">一覧</a>
        @if ($sort_type !== null)
                > {{ $sort_type }}
            <h1>{{ $sort_type }}の商品一覧{{$products_count}}件</h1>
        @else
            <h1>商品一覧{{$products_count}}件</h1>
        @endif
    </div>
    <div class="row products-wrapper">
        <hr>
        @foreach($products as $product)
        <div class="col-md-3 item">
            <p class="products-img">
                <a href="products/show/{{ $product->id }}">
                    <img src="{{ $product->img_name }}">
                </a>
            </p>
            <a href="products/show/{{ $product->id }}">{{ $product->name }}</a>
            <p class="text-right">{{ $product->price }}円</p>
        </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>
@endsection