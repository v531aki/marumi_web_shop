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
    <hr>
    <div class="row products-wrapper">
        @foreach($products as $product)
        <div class="col-md-3 item">
            <p class="products-img">
                <a href="products/show/{{ $product->id }}">
                    <img src="{{ $product->top_img }}">
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