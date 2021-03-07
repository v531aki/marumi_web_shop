@extends('layouts.app')

@section('content')
<div class="col-md-7">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Sewpad</h1>
                <p class="text-right"><a href="#">＋投稿する</a></p>
            </div>
        </div>
        @for($i = 0; $i < 10; $i++)
        <hr>
        <div class="row sew">
            <div class="products-img col-2">
                <img src="{{ asset('img/dummy.jpg') }}" alt="画像">
            </div>
            <div class="col-mb-10 description">
                <h3>涼しげなポロシャツ</h3>
                <p>初めてのお裁縫でポロシャツ作りに挑戦してみました！</p>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection