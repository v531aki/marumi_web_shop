@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-2">
        @component('components.sidebar', ['categories' => $categories, 'major_category_names' => $major_category_names])
        @endcomponent
    </div>
    <div class="col-md-7">
        <div class="row products-wrapper">
            <hr>
            <h1 class="col-md-12">商品一覧</h1>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
            <div class="col-md-3 item">
                <p class="products-img">
                    <img src="{{ asset('img/dummy.jpg')}}">
                </p>
                <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                <p class="text-right">560円</p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        @component('components.rightsidebar')
        @endcomponent
    </div>
</div>
@endsection