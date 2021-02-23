@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="main-wrapper col-md-7">
        <div class="container">
            <a href="/">トップ</a> > <a href="/products">一覧</a>
            @if ($category !== null)
                 > {{ $category->name }}
                <h1>{{ $category->name }}の商品一覧{{$products_count}}件</h1>
            @else
                <h1>商品一覧{{$products_count}}件</h1>
            @endif
        </div>
        <div class="row products-wrapper">
            <hr>
            @foreach($products as $product)
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <a href="{{route('products.show', $product)}}">{{ $product->name }}</a>
                <p class="text-right">{{ $product->price }}円</p>
            </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
    <div class="col-md-3">
        @component('components.rightsidebar')
        @endcomponent
    </div>
</div>
@endsection