@extends('layouts.app')

@section('content')
<div class="col-md-7">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>涼しげなポロシャツ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-5 products-img">
                <img src="{{ asset('img/dummy.jpg') }}" alt="画像">
            </div>
            <div class="col-7">
                <div class="row">
                    <div class="col-12">
                        <p>市販のポーチもいいけど、自分で作った物には何故か愛着がわきます。自分好みのポーチが欲しい人はおすすめ！</p>
                    </div>
                    <div class="col-12 mt-3">
                        <h2>材料</h2>
                    </div>
                    <div class="col-12">
                        <ul class="material">
                            <li>ファスナー<span class="float-right">10cm</span></li>
                            <li>表地<span class="float-right">60cm X 50cm</span></li>
                            <li>裏地<span class="float-right">60cm X 50cm</span></li>
                            <li>バイアステープ<span class="float-right">20cm</span></li>
                            <li>リボン<span class="float-right">20cm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>作り方の参考にしたサイト・書籍・動画</h2>
                <p><a href="https://book.nunocoto-fabric.com/4314">コロコロ感がかわいすぎる♡キャラメルポーチの作り方</a></p>
            </div>
            <div class="col-12">
                <hr>
            </div>
            <div class="col-12">
                <h2>難しかった点・こだわった点など</h2>
                <div class="row">
                    <div class="col-5 products-img">
                        <img src="{{ asset('img/dummy.jpg') }}" alt="画像">
                    </div>
                    <div class="col-7">
                        <p>ファスナーの取付や末端の処理が非常に難しかったですが、他のサイトも参考にしながら何とか取り付けることができました！</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <h2>この作品を作りたい方へおすすめの生地</h2>
                <div class="row">
                @for($i = 0; $i < 3; $i++)
                    <div class="col-md-4 item">
                        <div class="products-img">
                            <img src="{{ asset('img/dummy.jpg')}}">
                        </div>
                        <p>はりねずみとキノコ★綿麻プリント生地５色★110cm巾×10cm単位</p>
                        <p class="text-right">560円</p>
                    </div>
                @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection