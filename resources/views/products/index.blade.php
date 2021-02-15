@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="main-wrapper col-md-7">
        <div class="container">
            @if ($category !== null)
                <a href="/">トップ</a> > <a href="#">{{ $category->major_category_name }}</a> > {{ $category->name }}
                <h1>{{ $category->name }}の商品一覧{{$products->count()}}件</h1>
            @endif
        </div>
        <div class="row products-wrapper">
            <hr>
            @for($i = 0; $i < 16; $i++)
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            @endfor
        </div>
    </div>
    <div class="col-md-3">
        @component('components.rightsidebar')
        @endcomponent
    </div>
</div>
@endsection