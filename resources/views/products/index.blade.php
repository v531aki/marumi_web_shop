@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="main-wrapper col-md-7">
        <div class="container">
            <a href="/">トップ</a>
            @if ($category !== null)
                > <a href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                <h1>{{ $category->name }}の商品一覧{{$products->count()}}件</h1>
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
                <p>{{ $product->name }}</p>
                <p class="text-right">{{ $product->price }}円</p>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        @component('components.rightsidebar')
        @endcomponent
    </div>
</div>
@endsection