@extends('layouts.app')

@section('content')
<div class="main-wrapper col-md-7">
    <h1>掲示板</h1>
    <div class="row sew">
        <div class="top_img col-mb-2">
            <img src="{{ asset('img/dummy.jpg') }}" alt="">
        </div>
        <div class="col-mb-10 description">
            <p>涼しげなポロシャツ</p>
            <p>初めてのお裁縫でポロシャツ作りに挑戦してみました！</p>
        </div>
    </div>
</div>
@endsection