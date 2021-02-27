<div class="rightsidebar-wrapper">
    <div class="cart-view paling">
        <div class="cart-count-autor">
            <div class="cart-count-inner">
                <p>商品数：3</p>
            </div>
        </div>
        <hr>
        <div class="row cart-item">
            <div class="col-md-3">
                <p class="cart-img">
                    <img src="{{ asset('img/dummy.jpg') }}" alt="写真">
                </p>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <p class="col-md-12">品名：はりねずみとキノコ★綿麻プリント生地５色★</p>
                    <p class="col-md-12">長さ：100cm 小計：560円</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row cart-item">
            <div class="col-md-3">
                <p class="cart-img">
                    <img src="{{ asset('img/dummy.jpg') }}" alt="写真">
                </p>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <p class="col-md-12">品名：はりねずみとキノコ★綿麻プリント生地５色★</p>
                    <p class="col-md-12">長さ：100cm 小計：560円</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="row cart-item">
            <div class="col-md-3">
                <p class="cart-img">
                    <img src="{{ asset('img/dummy.jpg') }}" alt="写真">
                </p>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <p class="col-md-12">品名：はりねずみとキノコ★綿麻プリント生地５色★</p>
                    <p class="col-md-12">長さ：100cm 小計：560円</p>
                </div>
            </div>
        </div>
        <hr>
        <div class="cart-link">
            <a href="{{ route('carts.index') }}">カートを見る</a>
        </div>
    </div>
    <div class="ranking-wrapper paling">
        <div class="ranking-title">
            <p>売れ筋ランキング</p>
        </div>
        @for($i = 0; $i < 5; $i++)
        <hr>
            <div class="ranking-item">
                <div class="col-md-12">
                    <p class="rank">| {{ $i + 1 }}位 |</p>
                    <p class="rank-img">
                        <img src="{{ asset('img/dummy.jpg') }}" alt="写真">
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <p class="col-md-12">品名：{{ $ranker_products[$i]->name }}</p>
                        <p class="col-md-12 rank-cost">{{ $ranker_products[$i]->price }}円</p>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>