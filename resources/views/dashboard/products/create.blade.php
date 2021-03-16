@extends('layouts.dashboard')

@section('content')

<div class="dashboard-container">
    <h1>商品登録</h1>
    
    <form method="POST" action="/dashboard/products" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-inline row">
            <label for="product_name">商品名</label>
            <input type="text" name="name" id="product_name">
        </div>
        <div class="form-inline row">
            <label for="width">巾</label>
            <input type="text" name="width" id="width">
        </div>
        <div class="form-inline row">
            <label for="moq">最小購入長さ</label>
            <input type="text" name="moq" id="moq">
        </div>
        <div class="form-inline mt-4 mb-4 row">
            <label class="col-2 d-flex justify-content-start">画像</label>
            <div id="img-select" class="d-flex flex-column ml-2">
                <small class="mb-3">600px×600px推奨。<br>商品の魅力が伝わる画像をアップロードして下さい。</small>
                <label for="product-image0" id="img-loading-btn" class="btn marumi-submit-button">画像を選択</label>
                <input type="file" name="images[0]" id="product-image0" onChange="handleImage(this.files)" style="display: none;">
                <div id="target-tag"></div>
            </div>
        </div>
        <div class="form-inline row">
            <label for="description">説明</label>
            <input type="text" name="description" id="description">
        </div>
        <div class="form-inline row">
            <label for="price">価格</label>
            <input type="text" name="price" id="price">
        </div>
        <div class="form-inline row">
            <label for="stock">在庫</label>
            <input type="text" name="stock" id="stock">
        </div>
        <div class="form-inline row">
            <label for="special_feature">適用する特集</label>
            <input type="text" name="special_feature" id="special_feature">
        </div>
        <div class="form-inline row">
            <label for="restock">再入荷予定</label>
            <input type="date" name="restock" id="restock">
        </div>
        <div>
            <label for="categories">カテゴリー</label>
            @foreach ($major_category_names as $major_category_name)
            <div>
                <h2>{{ $major_category_name }}</h2>
                @foreach ($categories as $category)
                    @if ($category->major_category_name === $major_category_name)
                        <input type="checkbox" id="categories" name="categories[]" value="{{ $category->id }}">{{ $category->name }}
                    @endif
                @endforeach
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="w-25 btn marumi-submit-button">商品を登録</button>
        </div>
    </form>
</div>

<script type="text/javascript">
    function handleImage(image) {
        var i = document.getElementsByClassName("product-image-preview").length;
        var preview = document.getElementById('img-select');
        var label = document.getElementById('img-loading-btn');
        var input = document.getElementById(`target-tag`);
        i++;
        
        input.insertAdjacentHTML('beforebegin',`<input type="file" name="images[${i}]" id="product-image${i}" onChange="handleImage(this.files)" style="display: none;">`);
        label.htmlFor = `product-image${i}`;

        let reader = new FileReader();
        reader.onload = function() {
            preview.insertAdjacentHTML('beforebegin',`<img src="${reader.result}" id="product-image-preview${i}" class="product-image-preview">`);
        }
        console.log(image);
        reader.readAsDataURL(image[0]);
    }
</script>

@endsection

