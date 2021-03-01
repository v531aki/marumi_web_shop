<div class="rightsidebar-wrapper">
    <div class="cart-view paling">
        <div class="cart-count-autor">
            <div class="cart-count-inner">
            @if(count($carts) != 0)
                <p>商品数：{{ count($carts) }}種 合計：{{ $total }}円</p>
            @else
                <p>追加済みの商品はありません。</p>
            @endif
            </div>
        </div>
        <?php $i=0 ?>
        <?php $total=0 ?>
        @foreach($carts as $product)
        <hr>
        <?php $i++ ?>
        @if($i <= 3) 
        <div class="row cart-item">
            <div class="col-md-3">
                <p class="cart-img">
                    <img src="{{ asset('img/dummy.jpg') }}" alt="写真">
                </p>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <p class="col-md-12">品名：{{ $product->name }}</p>
                    <p class="col-md-12">長さ：{{ $product->qty * 10 }}cm 小計：{{ $product->price * $product->qty }}円</p>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        <hr>
        <div class="cart-link">
            <a href="{{ route('carts.index') }}">カートを見る</a>
        </div>
    </div>
    <div class="ranking-wrapper paling">
        <div class="ranking-title">
            <p>売れ筋ランキング</p>
        </div>
        @foreach($rankings as $ranking)
        <hr>
            <div class="ranking-item">
                <div class="col-md-12">
                    <p class="rank">| {{ $ranking->id }}位 |</p>
                    <p class="rank-img">
                        <img src="{{ asset('img/dummy.jpg') }}" alt="写真">
                    </p>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <p class="col-md-12">品名：{{ $ranking->name }}</p>
                        <p class="col-md-12 rank-cost">{{ $ranking->price }}円</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>